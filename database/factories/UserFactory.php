<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Club\User;
use Club\Network;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'lastname'=>$faker->lastname,
        'dni'=> rand(100000,1200032222),
        'email'=>$faker->unique()->freeEmail,
        'password' => 'Je25237118..',
        'date_n'=> now(),
        'network_id'=> Network::inRandomOrder()->value('id') ?: factory(Network::class),
        'rol_id' => 2,
        'confirmed' => true,
    ];
});
