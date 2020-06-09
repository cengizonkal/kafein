<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ServiceTable;
use Faker\Generator as Faker;

$factory->define(ServiceTable::class, function (Faker $faker) {
    return [

        'code' => $faker->countryCode,
        'description' => $faker->word,
        'service_table_status_id' => 1,

    ];
});
