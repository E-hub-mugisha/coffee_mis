<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory as Faker;

class CoffeeTipsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        $seasons = ['Dry Season', 'Rainy Season', 'Transition Season'];
        $categories = ['Harvesting', 'Storage', 'Fertilization', 'Pruning', 'Pest Control', 'Processing'];

        for ($i = 0; $i < 6; $i++) {
            DB::table('coffee_tips')->insert([
                'title' => ucfirst($faker->words(3, true)),
                'content' => $faker->paragraph(4),
                'season' => $faker->randomElement($seasons),
                'category' => $faker->randomElement($categories),
                'image' => 'tips/sample' . rand(1, 6) . '.jpg', // Optional image path
                'user_id' => $faker->randomElement($userIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
