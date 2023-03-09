<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request): View
    {
        if ($keyword = $request->input('keyword')) {
            $query = Article::search($keyword);
        } else {
            $query = Article::query();
        }
        $articles = $query->orderBy('id', 'DESC')->get();
        return view('index', ['articles' => $articles]);
    }
}
