<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'service_table_id' => \App\Models\ServiceTable::all()->random(1)->first()->id,
        'item_id' => \App\Models\Item::all()->random(1)->first()->id,
        'order_status_id' => \App\Models\OrderStatus::all()->random(1)->first()->id,
        'options' => ['onion' => 'no', 'sugar' => 'yes'],
        'comment' => $faker->text(50),
    ];
});
