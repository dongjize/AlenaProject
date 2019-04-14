<?php
/**
 * Created by PhpStorm.
 * User: dong
 * Date: 2019-04-15
 * Time: 00:06
 */

use App\Professional;
use Faker\Generator as Faker;

$factory->define(Professional::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'type_id' => random_int(1, 3),
        'charge' => random_int(40, 200),
    ];
});