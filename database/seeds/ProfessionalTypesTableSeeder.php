<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: dong
 * Date: 2019-04-14
 * Time: 01:03
 */
class ProfessionalTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('professional_types')->insert([
            'name' => 'podiatrist',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('professional_types')->insert([
            'name' => 'naturopath',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('professional_types')->insert([
            'name' => 'chiropractor',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
