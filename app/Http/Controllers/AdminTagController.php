<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('/admin/tag/index', compact('tags'));
    }
    public function create()
    {
        $tag = new Tag();
        return view('admin/tag/form', compact('tag'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'slug' => ['required', 'min:5', 'max:255',]
        ]);
        Tag::create($request->all());
        return redirect()->route('admin.tag');
    }
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin/tag/form-edit', compact('tag'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'slug' => ['required', 'min:5', 'max:255',]
        ]);
        Tag::save($request->all());
        return redirect()->route('admin.tag');
    }
}
