<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Utils\Facades\Helpers;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $cats = [
            "Head",
            "Hairs",
            "Eyes",
            "Lips",
            "Neck",
            "Torso",
            "Hand",
            "Vest",
            "Pants",
            "Shoes",
            "Skin",
        ];

        foreach ($cats as $key=>$cat) {
            $image = Helpers::createRandomImage();
            Category::updateOrCreate([
                'name'  => $cat,
            ], [
                'image' => $image,
                'order' => $key,
            ]);
        }

    }
}
