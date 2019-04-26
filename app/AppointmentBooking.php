<?php

namespace App;

class AppointmentBooking extends Model
{
    protected $hidden = ['pivot'];

    public function professional()
    {
        return $this->belongsTo(Professional::class, 'professional_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id', 'id');
    }

}
