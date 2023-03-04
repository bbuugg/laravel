@extends('layout.main')

@section('title')
    {{$article->title}}
@endsection

@section('css')
    <link rel="stylesheet" href="/vendor/editor-md/css/editormd.css"/>
    <link rel="stylesheet" href="/vendor/editor-md/css/editormd.preview.css"/>
    <style>
        .container {
            display: flex;
            justify-content: center;
        }

        .content {
            width: 70%;
        }
    </style>
@endsection

@section('body')
    <div class="container">
        <div class="content">
            <h1 style="text-align: center">{{$article->title}}</h1>
            <div id="test-editor">
                <textarea style="display:none;">{{$article->content}}</textarea>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="/vendor/editor-md/lib/marked.min.js"></script>
    <script src="/vendor/editor-md/lib/prettify.min.js"></script>

    <script src="/vendor/editor-md/lib/raphael.min.js"></script>
    <script src="/vendor/editor-md/lib/underscore.min.js"></script>
    <script src="/vendor/editor-md/lib/sequence-diagram.min.js"></script>
    <script src="/vendor/editor-md/lib/flowchart.min.js"></script>
    <script src="/vendor/editor-md/lib/jquery.flowchart.min.js"></script>

    <script src="/vendor/editor-md/editormd.js"></script>
    <script type="text/javascript">
        $(function () {
            editormd.markdownToHTML("test-editor", {
                htmlDecode: "style,script,iframe",  // you can filter tags decode
                emoji: true,
                taskList: true,
                tex: true,  // 默认不解析
                flowChart: true,  // 默认不解析
                sequenceDiagram: true,  // 默认不解析
            });
        });
    </script>
@endsection
