<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->resource('lesson', 'LessonController');
    $router->resource('article', 'ArticleController');
    $router->resource('question', 'QuestionController');
    $router->resource('category', 'CategoryController');
    $router->resource('lesson/{lessonId}/chapter', 'ChapterController');
    $router->resource('lesson/{lessonId}/chapter/{chapterId}/section', 'SectionController');
});
