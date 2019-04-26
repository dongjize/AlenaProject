<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    protected $rememberTokenName = '';
    protected $guarded = [];

    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class, 'customer_id', 'id');
    }

    public function occupiedTimeSlots()
    {
        return $this->belongsToMany(TimeSlot::class, 'appointment_bookings', 'customer_id', 'time_slot_id');
    }

}
