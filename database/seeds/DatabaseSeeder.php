<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \App\Models\OrderStatus::insert(
            [
                ['title' => 'Yeni'],
                ['title' => 'Hazırlanıyor'],
                ['title' => 'Hazır'],
                ['title' => 'Teslim Edildi'],
                ['title' => 'Ödendi']
            ]
        );
        \App\Models\ServiceTableStatus::insert(
            [
                ['title' => 'Servise Açık'],
                ['title' => 'Servise Kapalı'],
                ['title' => 'Reserve'],

            ]
        );
        $categories = factory(\App\Models\Category::class, 10)->create();
        $items = factory(\App\Models\Item::class, 150)->create();
        factory(\App\Models\ServiceTable::class, 15)->create();
        factory(\App\Models\Order::class, 500)->create();

        factory(\App\Models\Image::class, 50)->create(
            [
                'imageable_id' => $categories->random(1)->first()->id,
                'imageable_type' => \App\Models\Category::class
            ]
        );


        factory(\App\Models\Image::class, 100)->create(
            [
                'imageable_id' => $items->random(1)->first()->id,
                'imageable_type' => \App\Models\Item::class
            ]
        );
    }
}
