<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        $user = User::find($userId);
        $posts = Post::whereHas('user', function ($user) use ($userId) {
            $user->where('id', $userId);
        })->where('category_id', $categoryId)->get();
        return view('authorsCategory', compact('posts', 'user'));
    }
    public function authorsCategoryTag($userId, $categoryId, $tagId)
    {
        $user = User::find($userId);

        $posts = Post::whereHas('user', function ($user) use ($userId) {
            $user->where('id', $userId);
        })->where('category_id', $categoryId)->get();
        $tags = Tag::has('post_id', '=', 16)->get();
        dd($tags);

        return view('authorsCategoryTag', compact('posts', 'user'));
    }
}
