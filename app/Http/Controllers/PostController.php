<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); 
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    //public function create()
    //{
       // return view('posts.create');
    //}
    
    public function create(Tag $tag)
    {
       return view('posts.create')->with(['tags' => $tag->get()]);
    }
    
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $input['tag_id'] = 1;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}