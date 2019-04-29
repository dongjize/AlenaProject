<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Professional;
use App\ProfessionalType;
use App\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessionalController extends Controller
{
    public function index(Request $request, Professional $professionals)
    {
        $query = $professionals->newQuery();
        if ($request->has('type_id')) {
            $query->where('type_id', $request->input('type_id'));
        }
        $professionals = $query->orderBy('id')->with('type')->paginate(10);
        $profTypes = ProfessionalType::all();
        return view('professional.index', compact('profTypes', 'professionals'));
    }

    public function show(Professional $professional)
    {
        $customer_id = Auth::id();
        $professional_id = $professional->id;
        $all_time_slots = TimeSlot::all();
        $customer = Customer::find($customer_id);
        $professional = Professional::find($professional_id);

        $arr1 = $customer->occupiedTimeSlots;
        $arr2 = $professional->occupiedTimeSlots;

        $available_slots = $all_time_slots->filter(function ($item) use ($arr1, $arr2) {
            foreach ($arr1 as $slot1) {
                if ($item->id == $slot1->id) {
                    return false;
                }
            }
            foreach ($arr2 as $slot2) {
                if ($item->id == $slot2->id) {
                    return false;
                }
            }
            return true;
        });

        return view('professional.show', compact('professional', 'available_slots'));
    }

}
