<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function show($id): View
    {
        $article             = Article::query()->findOrFail($id);
        $article->timestamps = false;
        $article->increment('views');

        return view('article.show', compact('article'));
    }
}
