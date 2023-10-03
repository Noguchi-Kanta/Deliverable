<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <div class="image">
                <h2>写真</h2>
                <input type="file" name="image">
            </div>
            <div>
                <h2>タグ</h2>
                @foreach($tags as $tag)
                    <label>
                        <input type="checkbox" value="{{ $tag->id }}" name="tags_array[]">
                            {{$tag->name}}
                        </input>
                    </label>
                @endforeach
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>