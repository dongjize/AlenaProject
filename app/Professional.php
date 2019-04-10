<?php

namespace App;

class Professional extends Model
{
    protected $rememberTokenName = '';
    protected $guarded = [];

    public function type()
    {
        return $this->hasOne(ProfessionalType::class, 'id', 'type_id');
    }

    public function occupiedSlots()
    {
        return $this->hasMany(OccupiedSlot::class);
    }

    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class);
    }
}
