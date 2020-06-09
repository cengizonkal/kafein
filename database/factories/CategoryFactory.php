<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement(['Soğuk İçecek', 'Et', 'Balık', 'Tavuk', 'Sıcak İçecek']),
        'description' => $faker->text,
        'image_path' => public_path('img/category.png'),
    ];
});
