<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use RedisException;

class LoginController extends Controller
{
    /**
     * @throws ValidationException
     * @throws RedisException
     * @throws Exception
     */
    public function code(Request $request): RedirectResponse
    {
        $this->validate($request, ['code' => 'required']);
        $code     = $request->input('code');
        $redirect = $request->input('redirect_uri', '/');
        $redis    = Redis::connection()->client();
        $redisKey = 'wechat:login:randCode';
        if ($openId = $redis->hGet($redisKey, $code)) {
            /** @var User $user */
            $user = User::query()->where('openid', $openId)->first();
            Auth::login($user);

            return Response::redirectTo($redirect);
        }

        throw new Exception('登录失败');
    }
}
