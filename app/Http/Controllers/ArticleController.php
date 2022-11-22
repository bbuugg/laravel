<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::query()->findOrFail($id);

        return view('article.show', compact('article'));
    }
}
