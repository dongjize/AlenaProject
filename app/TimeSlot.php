<?php

namespace App;

use Illuminate\Support\Facades\DB;

class TimeSlot extends Model
{
    protected $table = 'time_slots';
    protected $hidden = ['pivot'];

    public static function updateOccupation($time_slot_id)
    {
        $query = DB::table('time_slots')->where('id', $time_slot_id);
        if ($query->value('occupied') == 0) {
            $query->update(['occupied' => 1]);
        }
    }

    public static function releaseOccupation($time_slot_id)
    {
        $query = DB::table('time_slots')->where('id', $time_slot_id);
        if ($query->value('occupied') == 1) {
            $query->update(['occupied' => 0]);
        }
    }

//    public static function occupied($time_slot_id)
//    {
//        $query = DB::table('time_slots')->where('id', $time_slot_id);
//        return $query->value('occupied') == 1;
//    }

    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class, 'time_slot_id', 'id');
    }

    public function available($time_slot_id, $customer_id, $professional_id)
    {
//        DB::table('appointment_bookings')->where('time_slot_id', $time_slot_id);
        $appointmentBookings = $this->appointmentBookings();

        $customer = Customer::find($customer_id)->get(1);
        $professional = Professional::find($professional_id)->get(1);

    }

}
