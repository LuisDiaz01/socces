<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Club\Athlete;
use Club\Network;
use Faker\Generator as Faker;

$factory->define(Athlete::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'lastname'=>$faker->lastname,
        'dni'=> rand(100000,1200032222),
        'email'=>$faker->unique()->freeEmail,
        'date_n'=> now()->format('d-m-Y'),
        'goles'=>rand(1,12),
        'attendances'=>rand(1,12)
    ];
});
