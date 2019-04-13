<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        return view('admin.home.index', compact('admin'));
    }

}
