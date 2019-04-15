<?php

namespace App\Http\Controllers\Admin;

use App\AppointmentBooking;
use App\Http\Controllers\Controller;

class AppointmentBookingController extends Controller
{
    public function index()
    {
        $appointments = AppointmentBooking::orderBy('created_at', 'desc')->with('customer')->with('professional')->paginate(10);
        return view('admin.appointment.index', compact('appointments'));
    }
}
