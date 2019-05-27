<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/appointments');
        }
        return view('login.index');
    }

    public function login()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
            'is_remember' => 'integer'
        ]);
        $customer = request(['email', 'password']);
        $is_remember = boolval(request('is_remember'));

        if (Auth::attempt($customer, $is_remember)) {
            return redirect('/appointments');
        }

        return Redirect::back()->withErrors("Email and password mismatch");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function welcome()
    {
        return \redirect("/login");
    }
}
