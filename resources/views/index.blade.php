<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>笔记</title>
</head>
<body>
<ul>
    @foreach($articles as $article)
        <li><a href="{{route('article', ['article' => $article->id])}}">{{$article->title}}</a></li>
    @endforeach
</ul>
<p style="text-align: center"><a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow noopener">
        陕ICP备2022013308号
    </a></p>
</body>
</html>
