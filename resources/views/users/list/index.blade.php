<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            マイページ
    </x-slot>
    @if (Session::has('message'))
     <p>{{ session('message') }}</p>
    @endif
    
    @if (Session::has('top_image_path'))
        <img src="https://res.cloudinary.com/dac07avbf/image/upload/v1697346022/no_image_ome59y.png" alt=""> 
    
    @elseif ($user->image_path == "https://res.cloudinary.com/dac07avbf/image/upload/v1697346022/no_image_ome59y.png")
        <p><img src="{{ $user->image_path }}" alt=""> </p>
        
    @else
        <p><img src="{{ $user->image_path }}" alt=""> </p>
        
    @endif
    <body>
    <p>名前:{{ $user->name }}</p>
    <p>メールアドレス:{{ $user->email }}</p>
    <p>自己紹介文:{{ $user->bio }}</p>
    @if($user->image_path)
        <div>
            <img src="{{ $user->image_path }}" alt="画像が読み込めません。"/>
        </div>
    @endif
    <p><a href='/profile'>ユーザー情報を変更する</a></p>
   
    
    <!-- マイページ変更画面 -->
    {{--<form action="/profile" method="post" enctype='multipart/form-data'> 
        {{ csrf_field() }}
        <!-- 画像内容 -->
        <div class='image'>
            <input type="file" name="top_image">
        </div>
        <input type="submit" value="変更する">
    </form>--}}
    </body>
    </x-app-layout>
</html>