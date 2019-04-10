<?php

namespace App;

class OccupiedSlot extends Model
{
    public function professional()
    {
        return $this->belongsTo(Professional::class, 'professional_id', 'id');
    }

}
