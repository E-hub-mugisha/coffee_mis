<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Harvest;
use Faker\Factory as Faker;

class CoffeeProductsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $harvests = Harvest::with('cooperative')->get();

        foreach ($harvests as $harvest) {
            for ($i = 0; $i < 6; $i++) {
                DB::table('coffee_products')->insert([
                    'name' => ucfirst($faker->word) . ' Coffee',
                    'price' => $faker->randomFloat(2, 5, 50), // between 5 and 50
                    'description' => $faker->sentence,
                    'quantity' => $faker->numberBetween(10, 500),
                    'harvest_id' => $harvest->id,
                    'cooperative_id' => $harvest->cooperative_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
