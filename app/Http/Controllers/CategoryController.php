<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController
{
    public function category(Category $category)
    {
        $posts = $category->posts;
        return view('category', compact('category', 'posts'));
    }
    public function index()
    {
        $categories = Category::all();
        return view('category/index', compact('categories'));
    }
}
