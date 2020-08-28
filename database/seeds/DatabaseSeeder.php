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
        $categories = factory(\App\Models\Category::class, 20)->create();
        $items = factory(\App\Models\Item::class, 150)->create();
        factory(\App\Models\ServiceTable::class, 15)->create();
        factory(\App\Models\Order::class, 500)->create();

        foreach ($items as $item) {
            factory(\App\Models\Image::class)->create(
                [
                    'imageable_id' => $item->id,
                    'imageable_type' => \App\Models\Image::class
                ]
            );

            $optionGroup = factory(\App\Models\OptionGroup::class)->create(
                [
                    'item_id' => $item->id
                ]
            );

            factory(\App\Models\Option::class, 5)->create(
                [
                    'option_group_id' => $optionGroup->id
                ]
            );
        }

        foreach ($categories as $category) {
            factory(\App\Models\Image::class, 1)->create(
                [
                    'imageable_id' => $category->id,
                    'imageable_type' => \App\Models\Category::class
                ]
            );
        }


        $parentId = $categories->pull(1)->id;
        foreach ($categories as $category) {
            $category->parent_id = $parentId;
            $category->save();
        }
    }
}
