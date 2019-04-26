<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: dong
 * Date: 2019-04-14
 * Time: 01:02
 */
class TimeSlotsTableSeeder extends Seeder
{

    public function run()
    {
        $start = Carbon::create(2019, 1, 1);
        $end = Carbon::create(2020, 1, 1);

        for ($time = $start; $time->lt($end); $time = $time->addHour()) {
            if ($time->hour >= 9 && $time->hour < 18) {
//                Log::debug($time);
                DB::table('time_slots')->insert([
                    'datetime' => $time,
//                    'occupied' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

    }

}