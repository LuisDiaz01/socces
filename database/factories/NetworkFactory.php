<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Club\Network;
use Faker\Generator as Faker;

$factory->define(Network::class, function (Faker $faker) {
    return [
        'facebook'=>$faker->name,
       	'twitter'=>$faker->name,
        'instagram'=>$faker->name,
    ];
});
