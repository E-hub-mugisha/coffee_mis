<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Farmer;
use App\Models\Cooperative;
use Faker\Factory as Faker;

class FarmsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $farmers = Farmer::with('cooperative')->get();

        foreach ($farmers as $farmer) {
            for ($i = 0; $i < 3; $i++) {
                DB::table('farms')->insert([
                    'cooperative_id' => $farmer->cooperative_id,
                    'farmer_id' => $farmer->id,
                    'name' => $faker->word . ' Farm',
                    'size_in_hectares' => $faker->randomFloat(2, 0.5, 5),
                    'location' => $faker->address,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
