<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tovar;
use Faker\Generator as Faker;

$factory->define(Tovar::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'price' => $faker->numberBetween($min = 10, $max = 10000),
        'art' => 'art' . $faker->numberBetween($min = 111, $max = 999),
        'size' => $faker->numberBetween($min = 10, $max = 40),
    ];
});
