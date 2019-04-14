<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function show(Customer $customer)
    {
        Customer::with('type')->get();
        return view('customer.show', compact('customer'));
    }

    public function update()
    {
        $customer = Auth::user();
        return view('customer.update', compact('customer'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:4|max:50',
//            'email' => 'required|unique:users,email|email',
//            'password' => 'required|min:6|max:20|confirmed',
            'phone' => 'required|max:50',
            'address' => 'required|max:200',
        ]);
        $name = request('name');
//        $email = request('email');
//        $password = bcrypt(request('password'));
        $phone = request('phone');
        $address = request('address');

        $customer = Auth::user();

        if ($name != $customer->name) {
            if (Customer::where('name', $name)->count() > 0) {
                return back()->withErrors('The name has been registered!');
            }
            $customer->name = $name;
        }

        if ($phone != $customer->phone) {
            if (Customer::where('phone', $phone)->count() > 0) {
                return back()->withErrors('The phone number has been registered!');
            }
            $customer->phone = $phone;
        }

        $customer->address = $address;

        $customer->save();

        return back();
    }
}
