<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(
    Image::class,
    function (Faker $faker) {
        return [
            'original_name' => 'logo.png',
            'width' => 100,
            'height' => 100,
            'path' => 'images/logo.png',
            'is_selected' => false
        ];
    }
);
