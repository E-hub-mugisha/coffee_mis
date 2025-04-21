<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cooperative;
use App\Models\Member;
use Faker\Factory as Faker;

class FarmerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $cooperatives = Cooperative::all();

        foreach ($cooperatives as $cooperative) {
            // Get members of this cooperative
            $members = Member::where('cooperative_id', $cooperative->id)->get();

            // Ensure we have members to assign
            if ($members->count() >= 6) {
                // Pick 6 random unique members from this cooperative
                $selectedMembers = $members->random(6);

                foreach ($selectedMembers as $member) {
                    DB::table('farmers')->insert([
                        'name' => $faker->name,
                        'cooperative_id' => $cooperative->id,
                        'member_id' => $member->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
