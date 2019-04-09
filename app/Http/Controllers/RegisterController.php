<?php

namespace App\Http\Controllers;


use App\Customer;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function register()
    {
        $this->validate(request(), [
            'name' => 'required|min:4|max:50|unique:customers,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6|max:20|confirmed',
            'phone' => 'required|max:50',
            'address' => 'required|max:200',
        ]);

        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $phone = request('phone');
        $address = request('address');

        Customer::create(compact('name', 'email', 'password', 'phone', 'address'));

        return redirect('/login');
    }
}
