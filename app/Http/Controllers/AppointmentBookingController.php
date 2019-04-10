<?php

namespace App\Http\Controllers;


use App\Customer;
use Illuminate\Support\Facades\Auth;

class AppointmentBookingController extends Controller
{
    public function index()
    {
        $customer = Customer::find(Auth::user()->id);
        $appointments = $customer->appointmentBookings()->orderBy('created_at', 'desc')->with('professional')->paginate(10);
        return view('admin.appointment.index', compact('appointments'));
    }
}
