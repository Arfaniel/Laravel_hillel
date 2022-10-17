<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController
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
        $users = User::all();
        return view('admin/post/form', compact('post', 'categories', 'tags', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255', 'unique:posts,title'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required', 'exists:categories,id'],
            'user_id' => ['required', 'exists:users,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);
        $post = Post::create($request->all());
        $post->tags()->attach($request['tags']);
        return redirect()->route('admin.post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin/post/form-edit', compact('post', 'categories', 'tags', 'users'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255', 'unique:posts,title'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required', 'exists:categories,id'],
            'user_id' => ['required', 'exists:users,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);
        $post = Post::find($request->id);
        $post->tags()->sync($request['tags']);
        $post->update($request->all());
        return redirect()->route('admin.post');
    }
}
