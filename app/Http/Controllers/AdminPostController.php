<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminPostController
{
    public function index()
    {
        $posts = Post::paginate(10);

        return view('/admin/post/index', compact('posts'));
    }
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin/post/form', compact('post', 'categories', 'tags'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255', 'unique:posts,title'],
            'body' => ['required', 'min:10'],
            'category_id' => ['exists:categories,id'],
            'user_id' => ['exists:users,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);
        Post::create($request->all());
        return redirect()->route('admin.post');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin/post/form-edit', compact('post'));
    }
}
