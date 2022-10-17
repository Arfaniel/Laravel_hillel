<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController
{
    public function tag(Tag $tag)
    {
        $posts = $tag->with('posts')->get();
        return view('tag', compact('posts', 'tag'));
    }
}
