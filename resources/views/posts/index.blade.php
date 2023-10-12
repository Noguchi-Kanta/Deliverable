<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
            
            <div class='posts' style="padding-left:20px; margin-top:20px; margin-bottom:20p">
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
                
                @if (Auth::user()->is_like($post->id))
                <form method="POST" action="{{ route('likes.unlike', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button btn btn-warning">いいね！を外す</button>
                </form>
                @else
                <form method="POST" action="{{ route('likes.like', $post->id) }}">
   　　　　　　　    　　　　 @csrf
                     <button type="submit" class="button btn btn-success">いいね！を付ける</button>
                </form>
                @endif
                
                <div class="text-right mb-2">いいね！
                  <span class="badge badge-pill badge-suc cess">{{ $post->like_users->count() }}</span>
                </div>
                
                @if (Auth::user()->id == $post->user_id) 
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
                @endif
    
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
