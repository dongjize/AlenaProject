<?php

namespace App;

class Professional extends Model
{
//    public function appointmentBookings()
//    {
//        return $this->hasMany(AppointmentBooking::class);
//    }

    public function occupiedSlots()
    {
        return $this->hasMany(OccupiedSlot::class);
    }
}
