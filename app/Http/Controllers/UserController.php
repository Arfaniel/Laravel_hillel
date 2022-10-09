<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class UserController
{
    public function author(User $user)
    {
        $posts = $user->posts;
        return view('author', compact('user', 'posts'));
    }
    public function authorsCategory($userId, $categoryId)
    {
        $category = Category::find($categoryId);
        $categoryPosts = $category->posts;
        $user = User::find($userId);
        $userPosts = $user->posts;
        $posts = Post::whereHas('posts', function($categoryId, $post){
            $post->where('category_id', '=', $categoryId);
        })->get();
        dd($posts);
        return view('authorsCategory', compact('posts', 'user'));
    }
}
