<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
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
                <h3>タグ</h3>
                <p>{{ $tag->name }}</p>  
            </div>
        </div>
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