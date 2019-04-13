<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('time_slots')->insert([

        ]);

//        User::create(array('email' => 'foo@bar.com'));
    }

}