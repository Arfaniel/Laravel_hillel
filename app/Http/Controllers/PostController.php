<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::with('category', 'user', 'tags')->get();
        return view('index', compact('posts'));
    }
}
