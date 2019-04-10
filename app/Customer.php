<?php

namespace App;


class Customer extends User
{
    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class);
    }
}
