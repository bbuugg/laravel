<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WeChatController extends Controller
{
    public function index(Request $request)
    {
        $appid     = 'wx85ea4e88d488a6bb';
        $appSecret = '33c4f10731ce1b2915abb6e7ca35ad3e';
        $code      = $request->input('code');
        $client    = new Client();
        $response  = $client->get('https://api.weixin.qq.com/sns/jscode2session', [
            'query' => [
                'appid'      => $appid,
                'secret'     => $appSecret,
                'js_code'    => $code,
                'grant_type' => 'authorization_code',
            ],
        ]);

        $content = $response->getBody()->getContents();

        return Response::make($content);
    }
}
