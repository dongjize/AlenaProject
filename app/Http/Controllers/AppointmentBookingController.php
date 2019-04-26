<?php

namespace App\Http\Controllers;


use App\AppointmentBooking;
use App\Customer;
use App\Mail\AppointmentBooked;
use App\TimeSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AppointmentBookingController extends Controller
{
    public function index()
    {
        $appointments = AppointmentBooking::where('customer_id', Auth::id())->with('professional')->orderBy('created_at', 'desc')->paginate(10);
        return view('appointment.index', compact('appointments'));
    }

    public function show(AppointmentBooking $appointment)
    {
        AppointmentBooking::with('professional')->get();
        AppointmentBooking::with('customer')->get();
        AppointmentBooking::with('timeSlot')->get();
        return view('appointment.show', compact('appointment'));
    }

    public function create()
    {
        return view('appointment.create');
    }

    public function store()
    {

        $this->validate(request(), [
            'professional_id' => 'required|int',
            'time_slot_id' => 'required|int',
            'message' => 'string|max:500',
        ]);

        $customer_id = Auth::id();
        $professional_id = request('professional_id');
        $time_slot_id = request('time_slot_id');
//        $time_slot_id = 2;
        $message = request('message');






        if (TimeSlot::occupied($time_slot_id)) {
            TimeSlot::updateOccupation($time_slot_id);
            $params = compact('customer_id', 'professional_id', 'time_slot_id', 'message');
            $appointment = AppointmentBooking::create($params);
            return redirect('/appointments/email')->with('appointment', $appointment);
        }
        // TODO else

    }

    public function delete(AppointmentBooking $appointment)
    {
        $this->authorize('delete', $appointment);
        TimeSlot::releaseOccupation($appointment->time_slot_id);
        $appointment->delete();
        return redirect("/appointments");
    }

    public function email()
    {
        $appointment = Session::get('appointment');

        $customer = Customer::find(Auth::id());
        Mail::to($customer)->send(new AppointmentBooked());
        return redirect('appointments/' . $appointment->id);
    }
}
