<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function comment(Comment $comment, Post $post, Request $request)
    {
        $input = $request['comments'];
        $input += ['user_id' => Auth::id()];
        $input += ['post_id' => $post->id];
        $comment->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }    

    
}

