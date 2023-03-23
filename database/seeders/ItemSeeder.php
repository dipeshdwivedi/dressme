<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Utils\Facades\Helpers;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $categories = Category::all();
        $faker = Factory::create();

        foreach ($categories as $cat) {
            for($i=0; $i<5; $i++) {
                $image = Helpers::createRandomImage();

                $item = [
                    'name'          => $faker->colorName,
                    'price'         => $faker->numberBetween(100, 50000),
                    'category_id'   => $cat->id,
                    'image'         => $image,
                ];

                Item::create($item);
            }
        }
    }
}
