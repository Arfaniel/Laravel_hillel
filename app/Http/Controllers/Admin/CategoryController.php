<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);
        return view('/admin/category/index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);
        $category = new Category();
        return view('admin/category/form', compact('category'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'slug' => ['required', 'min:5', 'max:255',]
        ]);
        Category::create($request->all());
        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        $this->authorize('create', Category::class);
        $category = Category::find($id);
        return view('admin/category/form-edit', compact('category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'slug' => ['required', 'min:5', 'max:255',]
        ]);
        $category = Category::find($request->id);
        $category->update($request->all());
        return redirect()->route('admin.category');
    }

    public function destroy(Request $request)
    {
        $this->authorize('create', Category::class);
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('admin.category');
    }
}
