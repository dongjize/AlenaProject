<?php

namespace App\Http\Controllers;


use App\AppointmentBooking;
use App\Customer;
use App\TimeSlot;
use Illuminate\Support\Facades\Auth;

class AppointmentBookingController extends Controller
{
    public function index()
    {
        $customer = Customer::find(Auth::id());
//        dd($customer->appointmentBookings());
        $appointments = $customer->appointmentBookings()->with('professional')->orderBy('created_at', 'desc')->paginate(10);
        return view('appointment.index', compact('appointments'));
    }


    public function create()
    {
        return view('appointment.create');
    }

    public function store()
    {

//        $this->validate(request(), [
//            'professional_id' => '',
//            'message' => 'string|max:500'
//        ]);


        $customer_id = Auth::id();
//        $professional_id = request('professional_id');
//        $message = request('message');
//        $time_slot_ids = request('time_slot_ids');
        $professional_id = 1;
        $message = "hahahaha";
        $time_slot_ids = "3286|3287";

        $updated = TimeSlot::updateOccupation($time_slot_ids);
        if ($updated) {
            $params = compact('customer_id', 'professional_id', 'time_slot_ids', 'message');
            AppointmentBooking::create($params);
        }
        return redirect('/appointments');

    }
}
