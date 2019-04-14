<?php

use Illuminate\Database\Seeder;


class ProfessionalTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Professional::class, 50)->create();
    }
}