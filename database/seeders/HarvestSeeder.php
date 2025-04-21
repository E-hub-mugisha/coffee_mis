<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Farm;
use Faker\Factory as Faker;

class HarvestSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $harvestTypes = ['Arabica', 'Robusta'];
        $coffeeGrades = ['A1', 'A2', 'B', null];

        $farms = Farm::with('farmer', 'cooperative')->get();

        foreach ($farms as $farm) {
            for ($i = 0; $i < 6; $i++) {
                DB::table('harvests')->insert([
                    'cooperative_id' => $farm->cooperative_id,
                    'farm_id' => $farm->id,
                    'farmer_id' => $farm->farmer_id,
                    'harvest_name' => $faker->year . ' Coffee Harvest',
                    'harvest_type' => $faker->randomElement($harvestTypes),
                    'harvest_date' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                    'coffee_grade' => $faker->randomElement($coffeeGrades),
                    'quantity' => $faker->randomFloat(2, 10, 500), // e.g., 10 to 500 KG
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
