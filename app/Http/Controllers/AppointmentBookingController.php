<?php

namespace App\Http\Controllers;


use App\AppointmentBooking;
use App\Customer;
use App\Mail\AppointmentBooked;
use App\Mail\AppointmentCancelled;
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
            'datetime' => 'required|string',
            'message' => 'string|max:500',
        ]);

        $customer_id = Auth::id();
        $professional_id = request('professional_id');
        $datetime = request('datetime');
        $message = request('message');

        $time_slot = TimeSlot::where('datetime', $datetime)->first();
        $time_slot_id = $time_slot->id;
        if (!TimeSlot::available($time_slot_id, $customer_id, $professional_id)) {
            return null; // TODO handle occupied
        }
        $params = compact('customer_id', 'professional_id', 'time_slot_id', 'message');
        $appointment = AppointmentBooking::create($params);
        return redirect('/appointments/booked')->with('appointment', $appointment);

    }

    public function delete(AppointmentBooking $appointment)
    {
        $this->authorize('delete', $appointment);
        $appointment->delete();
        return redirect('/appointments/cancelled')->with('appointment', $appointment);
    }

    public function booked()
    {
        $appointment = Session::get('appointment');
        $customer = Customer::find(Auth::id());
        Mail::to($customer)->send(new AppointmentBooked($appointment));
        return redirect('appointments/' . $appointment->id);
    }

    public function cancelled()
    {
        $appointment = Session::get('appointment');
        $customer = Customer::find(Auth::id());
        Mail::to($customer)->send(new AppointmentCancelled($appointment));
        return redirect('appointments/');
    }
}
