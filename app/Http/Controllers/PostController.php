<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('navbarview.posts', [
            "title" => "Posts",
            "posts" => Post::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('navbarview.post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
