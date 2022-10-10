<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController
{
    public function tag(Tag $tag)
    {
        $posts = $tag->posts();
        return view('tag', compact('posts', 'tag'));
    }
}
