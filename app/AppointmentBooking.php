<?php

namespace App;

use Illuminate\Support\Facades\DB;

class AppointmentBooking extends Model
{
    public function professional()
    {
        return $this->belongsTo('App\Professional', 'professional_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    // TODO CHECK
    public function timeSlots()
    {
        $idsStr = $this->getAttribute('time_slot_ids');
        $idsArr = explode("|", $idsStr);
        $arr = [];
        foreach ($idsArr as $id) {
            $arr[] = $this->find($id);
        }
        return $arr;
    }

    public function startTime()
    {
        $time_slot_ids = $this->getAttribute('time_slot_ids');
        $idsArr = explode('|', $time_slot_ids);
        $startTime = DB::table("time_slots")->where('id', $idsArr[0])->value('datetime');
        return $startTime;
    }

    public function duration()
    {
        $time_slot_ids = $this->getAttribute('time_slot_ids');
        return count(explode('|', $time_slot_ids));
    }

}
