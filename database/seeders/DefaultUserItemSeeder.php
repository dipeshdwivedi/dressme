<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DefaultUserItemSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = User::factory()->create();

        $categories = Category::with('items')
            ->inRandomOrder()
            ->limit(4)
            ->get()
            ->map(function($q) {
                return $q->items->first()->id;
            })
            ->toArray();

        $user->items()->attach($categories, ['is_active' => 1]);
    }
}
