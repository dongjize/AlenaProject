<?php

namespace App;

use Illuminate\Support\Facades\DB;

class TimeSlot extends Model
{
    protected $table = 'time_slots';
    protected $hidden = ['pivot'];

    public static function getTimeSlotByDateTime($datetime)
    {
        $query = DB::table('time_slots')->where('datetime', $datetime);
        return $query->value('id');
    }

    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class, 'time_slot_id', 'id');
    }

    public static function available($time_slot_id, $customer_id, $professional_id)
    {
        $appointment = DB::table('appointment_bookings')
            ->where('time_slot_id', $time_slot_id)
            ->where('customer_id', $customer_id)
            ->where('professional_id', $professional_id)->first();
        return $appointment == null;
    }

}
