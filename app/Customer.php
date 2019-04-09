<?php

namespace App;

class Customer extends Model
{
    public function type()
    {
        return $this->hasOne(ProfessionalType::class, 'id', 'type_id');
    }

    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class);
    }
}
