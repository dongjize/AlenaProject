<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login()
    {
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required|min:6|max:20',
        ]);

        $user = request(['email', 'password']);
        if (Auth::guard('admin')->attempt($user)) {
            return redirect('admin/home');
        }

        return Redirect::back()->withErrors("Email or password error");

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
