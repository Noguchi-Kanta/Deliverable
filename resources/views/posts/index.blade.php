<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <x-slot name="header">
            ホーム
        </x-slot>
        <body>
            <h1>Blog Name</h1>
            <div>
           　    <form action="{{ route('search') }}" method="GET" style="padding-left:20px; margin-top:20px; margin-bottom:20px">
                    <input type="text" name="keyword" placeholder="キーワードを入力" style='padding-right:150px;'>
                    <input type="submit" value="検索" style='border:solid 1px; margin-bottom: 10px;'>
                </form>
        　　</div>
            <a href='/posts/create'>create</a>
            <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                     <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='body'>{{ $post->body }}</p>
                @if($post->image_path)
                <div>
                    <img src="{{ $post->image_path }}" alt="画像が読み込めません。"/>
                </div>
                @endif
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            </div>
            @endforeach
        　　</div>
        　　<h1>
        　      ログインユーザー: {{ Auth::user()->name }}
        　　</h1>
        　　<div class='paginate'>
            　　{{ $posts->links() }}
    　　      </div>
        　　<script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
            </script>
        </body>
    </x-app-layout>
</html>
