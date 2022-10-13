<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login()
    {
        return view('auth/form');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5']
        ]);
        if (Auth::attempt($data)) {
            return redirect()->route('admin.panel');
        }
        return back()->withErrors([
            'email' => 'Invalid user or password'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');
    }
}
