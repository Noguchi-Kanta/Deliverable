<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;
use Cloudinary;

class PostController extends Controller
{
    
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); 
    }
    
    public function show(Post $post, Tag $tag, Comment $comment)
    {
        return view('posts.show')->with(['post' => $post, 'tag' => $tag->first(), 'comments' => $post -> comments()->get() ]);
    }
    
    public function create(Tag $tag)
    {
       return view('posts.create')->with(['tags' => $tag->get()]);
    }
    
    
    public function store(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $input_tags = $request->tags_array;
        $input_post['user_id'] = Auth::id();
        if($request->file('image')){
            $image_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input_post += ['image_path' => $image_path];
        }
        $post->fill($input_post)->save();
        $post->tags()->attach($input_tags);
        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('keyword');
        $query = Posts::query();
        
        if(!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('body', 'LIKE', "%{$search}%");
        } 
        
        $posts = $query->get();
        return view('posts/index', compact('posts', 'keyword'));
        //$posts = $query->orderBy('id','desc')->paginate(10);
        //return view('index', ['posts' => $posts, 'search' => $search]);
   
    }
}