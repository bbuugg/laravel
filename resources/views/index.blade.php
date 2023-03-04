@extends('layout.main')
@section('title')
    笔记
@endsection
@section('body')
    <ul>
        @foreach($articles as $article)
            <li><a href="{{route('article', ['article' => $article->id])}}">{{$article->title}}</a></li>
        @endforeach
    </ul>
@endsection
