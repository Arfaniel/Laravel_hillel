<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
    public function author(User $user)
    {

        $posts = $user->posts();
        return view('author', compact('user', 'posts'));
    }
}
