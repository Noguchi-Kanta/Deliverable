<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Post</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="body">
            <div class="body__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        @if($post->image_path)
        <div>
            <img src="{{ $post->image_path }}" alt="画像が読み込めません。"/>
        </div>
        @endif
        <div class="tag">
            <div class="tag__post">
                @foreach($tags as $tag)
                {{--@foreach($post->tags as $tag)--}}
                <p>タグ:<a href="/tags/{{ $post->tag_id }}" {{--value="{{ $tag->id}}" name="tags_array[]"--}}>{{ $tag->name }}</a></p>
                @endforeach
            </div>
        </div>
        {{-- @foreach ($posts as $post)
        <hr>s
        <p>Tags: @foreach ($post->tags as $tag) {{ $tag->name }} @endforeach </p>
        <p>{{ $post->body }}</p>
        @endforeach--}}
        <form action="/{{ $post->id }}/comment" method="post">
            @csrf
            <h3>コメントをする</h3>
            <textarea name="comments[body]"></textarea>
            <input type="submit"  value="送信"/>
        </form>
        <div>
            <h3>コメント一覧</h3>
            @foreach($comments as $comment)
                <p>コメントした人：{{ $comment->user->name }}</p>
                <p>　　  コメント：{{ $comment->body }}</p>
            @endforeach
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>