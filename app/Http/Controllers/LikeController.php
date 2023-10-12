<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, $id)
    {
            \Auth::user()->like($id);
            return back();
    }

    public function destroy($id)
    {
            \Auth::user()->unlike($id);
            return back();
    }
    
    public function index()
    {
       
    }
}
