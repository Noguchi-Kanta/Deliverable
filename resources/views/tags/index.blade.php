<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            タグ一覧
    </x-slot>
        <body class="bg-gray-500" style="background-color">
            <h1 style="padding;15px; font-size:30px; font-weight:bold">Boulderer</h1>
            <div>
           　    <form action="{{ route('search') }}" method="GET" style="padding-left:20px; margin-top:20px; margin-bottom:20px">
                    <input type="text" name="keyword" value="@if(isset($search)){{ $search }}@endif" placeholder="キーワードを入力" style='padding-right:150px;'>
                    <input type="submit" value="検索" style='border:solid 1px; margin-bottom: 10px;'>
                </form>
        　　</div>
            <a href='/posts/create' style="border:solid; margin:20px; background-color:rgba(163,230,53,0.5)">create</a>
            
            <div class='posts' style="padding-left:20px; margin-top:20px; margin-bottom:20p">
            @foreach ($posts as $post)
            <div class="post" style="border:double">
                <div class="user_name">
                    <p>{{ $post->user->name }}</p>
                    <!--{{ optional(Auth::user())->name }} -->
                </div>
                <h2 class='title'>
                     <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='body'>{{ $post->body }}</p>
                @if($post->image_path)
                <div>
                    <img src="{{ $post->image_path }}" alt="画像が読み込めません。"/>
                </div>
                @endif
            </div>
            <div>
                
                @if (Auth::user()->id == $post->user_id) 
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="text-right text-red-500" style="color:red">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
                @endif
                
                @if (Auth::user()->is_like($post->id))
                <form method="POST" action="{{ route('likes.unlike', $post->id) }}" style="border:inset; width:7%; padding:2px; text-align:center; background-color:rgba(255,105,180,0.5)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button btn btn-warning">いいね！</button>
                </form>
                @else
                <form method="POST" action="{{ route('likes.like', $post->id) }}" style="border:outset; width:7%; padding:10px; text-align:center">
   　　　　　　　    　　　　 @csrf
                     <button type="submit" class="button btn btn-success">いいね！</button>
                </form>
                @endif
                
                <div class="text-right mr-15">いいね！
                  <span class="badge badge-pill badge-suc cess">{{ $post->like_users->count() }}</span>
                </div>
    
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