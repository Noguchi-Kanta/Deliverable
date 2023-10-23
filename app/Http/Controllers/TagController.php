<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\Tag;
use App\models\Post;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
       return view('tags.index')->with(['posts' => $tags->getByTags()]);
    }
}
