<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CEO;
use Faker\Generator as Faker;

$factory->define(CEO::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'givenName' => $faker->name,
        'familyName' => $faker->name,
        'password' => $faker->password,
    ];
});
