<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class CustomerController extends BaseController
{
    public function show(Customer $customer)
    {
        Customer::with('type')->get();
        return view('customer.show', compact('customer'));
    }

    public function update()
    {
        return view('customer.index');
    }

    public function store(Customer $customer)
    {

    }
}
