<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);
Route::resource('article', \App\Http\Controllers\ArticleController::class)
     ->name('show', 'article');

Route::get('lesson', [\App\Http\Controllers\LessonController::class, 'index']);

Route::get('auth/applet', function (\Illuminate\Http\Request $request) {
    $appId     = 'wxf7a9b004405a1c84';
    $appSecret = '89bd4993f0b6186fa22615e275b1fdb1';
    $client    = new \GuzzleHttp\Client([
        'base_uri' => 'https://api.weixin.qq.com/',
    ]);
    $response  = $client->get('sns/jscode2session', [
        'query' => [
            'appid'      => $appId,
            'secret'     => $appSecret,
            'js_code'    => $request->input('code'),
            'grant_type' => 'authorization_code',
        ]
    ]);

    $contents = $response->getBody()->getContents();
    $contents = json_decode($contents, true);
    if (!isset($contents['openid'])) {
        throw new Exception('登录失败');
    }

    $user = \App\Models\User::where('openid', $contents['openid'])->first();
    if (!$user) {
        $user = \App\Models\User::create(['name' => '微信用户', 'openid' => $contents['openid']]);
    }

    return \Illuminate\Support\Facades\Response::json(\App\Models\User::find($user->id));
});
