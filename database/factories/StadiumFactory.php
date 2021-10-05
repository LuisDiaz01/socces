<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Club\Stadium;
use Faker\Generator as Faker;

$factory->define(Stadium::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
    ];
});
