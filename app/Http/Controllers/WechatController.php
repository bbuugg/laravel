<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\Wechat;
use EasyWeChat\Kernel\Exceptions\BadRequestException;
use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;
use EasyWeChat\Kernel\Exceptions\RuntimeException;
use EasyWeChat\OfficialAccount\Application;
use EasyWeChat\OfficialAccount\Message;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;

class WechatController extends Controller
{
    /**
     * @param Request $request
     *
     * @return ResponseInterface
     * @throws InvalidArgumentException
     * @throws BadRequestException
     * @throws RuntimeException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function officialAccount(Request $request, Wechat $wechat)
    {
        Log::debug('微信公众号：', ['request' => $request->all()]);
        $server = $wechat->getServer();
        $server->with(function (Message $message, \Closure $next) {
            if (strcasecmp('login', $message->Content) === 0) {
                $redis    = Redis::connection()->client();
                $redisKey = 'wechat:login:randCode';
                do {
                    $randCode = Str::random(6);
                } while ($redis->hGet($redisKey, $randCode));
                $openId = $message->FromUserName;
                $redis->hSet($redisKey, $randCode, $openId);
                User::query()->firstOrCreate(['openid' => $openId]);
                return $randCode;
            }

            return $next($message);
        });

        return $server->serve();
    }

    /**
     * @throws InvalidArgumentException
     */
    public function login(Request $request, Wechat $wechat)
    {
        $redirect = $request->input('redirect_uri');
        Session::flash('wechat.login.redirect_uri', $redirect);
        $oauth = $wechat->getApp()->getOAuth();
        if (!$code = $request->input('code')) {
            Log::debug('微信授权登录：', ['request' => $request->all()]);
            $redirectUrl = $oauth->scopes(['snsapi_userinfo'])->redirect($request->fullUrl());

            return Response::redirectTo($redirectUrl);
        }

        $wxUser = $oauth->userFromCode($code);
        /** @var Authenticatable $user */
        $user = User::query()->updateOrCreate(['openid' => $wxUser->getId()], [
            'name' => $wxUser->getName(),
        ]);

        Auth::login($user);

        return Response::redirectTo(Session::pull('wechat.login.redirect_uri', '/'));
    }
}
