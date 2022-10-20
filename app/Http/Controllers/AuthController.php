<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login()
    {
        $url = "https://github.com/login/oauth/authorize";
        $parameters = [
            'client_id' => getenv('OAUTH_GITHUB_CLIENT_ID'),
            'redirect_uri' => getenv('OAUTH_GITHUB_REDIRECT_URI'),
            'scope' => 'user'
        ];
        $url .= '?' . http_build_query($parameters);
        return view('auth/form', compact('url'));
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
