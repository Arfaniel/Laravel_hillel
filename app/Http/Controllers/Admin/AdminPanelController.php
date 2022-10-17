<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;

class AdminPanelController
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.panel');
    }
}
