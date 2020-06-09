<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->colorName,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(10, 100),
        'category_id' => \App\Models\Category::all()->random(1)->first()->id,
    ];
});
