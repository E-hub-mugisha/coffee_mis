<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Cooperative;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    public function run()
    {
        // Instantiate Faker to generate random data
        $faker = Faker::create();

        // Get all cooperatives
        $cooperatives = Cooperative::all();

        foreach ($cooperatives as $cooperative) {
            // Create 6 members for each cooperative
            for ($i = 0; $i < 6; $i++) {
                DB::table('members')->insert([
                    'cooperative_id' => $cooperative->id, // Assign to the current cooperative
                    'full_name' => $faker->name, // Generate a random name
                    'national_id' => 'ID-' . strtoupper(Str::random(6)), // Random national ID
                    'phone' => $this->generateRwandanPhoneNumber(), // Rwandan phone number
                    'gender' => $faker->randomElement(['Male', 'Female']), // Random gender
                    'role' => $faker->randomElement(['Producer', 'Manager', 'Admin']), // Random role
                    'address' => $faker->address, // Random address
                    'join_date' => $faker->date(), // Random join date
                    'profile_photo' => 'profile_photo' . rand(1, 5) . '.jpg', // Random profile photo
                    'status' => $faker->randomElement(['active', 'inactive']), // Random status
                    'deactivation_reason' => $faker->optional()->text(), // Optional deactivation reason
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    // Method to generate Rwandan phone number
    private function generateRwandanPhoneNumber()
    {
        $prefix = ['078', '072', '073'];
        $randomPrefix = $prefix[array_rand($prefix)];
        $number = $randomPrefix . rand(1000000, 9999999); // Generate a 7-digit number
        return $number;
    }
}
