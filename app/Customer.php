<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    protected $rememberTokenName = '';
    protected $guarded = [];

    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class);
    }
}
