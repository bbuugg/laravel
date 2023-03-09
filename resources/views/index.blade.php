@extends('layout.main')
@section('title')
    笔记
@endsection
@section('body')
    <form action="">
        <p>
            <input type="text" name="keyword" placeholder="搜索">
        </p>
    </form>
    <ul>
        @foreach($articles as $article)
            <li><a href="{{route('article', ['article' => $article->id])}}">{{$article->title}}</a></li>
        @endforeach
    </ul>
@endsection
