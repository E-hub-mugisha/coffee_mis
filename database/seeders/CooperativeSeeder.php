<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class CooperativeSeeder extends Seeder
{
    public function run()
    {
        // Names of Rwandan locations for cooperatives
        $locations = ['Kigali', 'Musanze', 'Gisenyi', 'Ruhengeri', 'Nyundo', 'Karongi'];

        // Generate 6 sample cooperatives data
        for ($i = 0; $i < 6; $i++) {
            DB::table('cooperatives')->insert([
                'user_id' => User::inRandomOrder()->first()->id, // Assign a random user ID
                'name' => $locations[$i] . ' Coffee Cooperative', // Cooperative names based on locations
                'address' => $locations[$i] . ' District, Rwanda', // Address with location
                'registration_number' => 'REG-' . strtoupper(Str::random(6)), // Unique registration number
                'phone' => $this->generateRwandanPhoneNumber(), // Generating a Rwandan phone number
                'description' => 'A coffee cooperative based in ' . $locations[$i], // Description with location
                'logo' => 'logo' . rand(1, 5) . '.png', // Random logo name
                'established_at' => now(),
                'status' => $i % 2 == 0 ? 'active' : 'inactive', // Alternating status
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    // Method to generate Rwandan phone number
    private function generateRwandanPhoneNumber()
    {
        $prefix = ['078', '072', '073'];
        $randomPrefix = $prefix[array_rand($prefix)];
        $number = $randomPrefix . rand(1000000, 9999999); // Generate the 7-digit number
        return $number;
    }
}
