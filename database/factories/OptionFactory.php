<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Option;
use Faker\Generator as Faker;

$factory->define(
    Option::class,
    function (Faker $faker) {
        return [
            'price' => $faker->numberBetween(0, 20),
            'name' => $faker->colorName
        ];
    }
);
