<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TimeSlot extends Model
{
    protected $table = ['time_slots'];

    public static function updateOccupation($time_slot_ids)
    {
        $idsArr = explode('|', $time_slot_ids);
        foreach ($idsArr as $id) {
            $query = DB::table('time_slots')->where('id', $id);
            if ($query->value('occupied') == 0) {
                $query->update(['occupied' => 1]);
                return true;
            }
            return false;
        }
        return false;
    }


    public function occupied()
    {
        return $this->getAttributeValue('occupied');
    }
}
