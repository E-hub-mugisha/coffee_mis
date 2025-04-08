<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Farmer;
use App\Models\Cooperative;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Farm;
use App\Models\Harvest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create some cooperatives
        Cooperative::factory()->count(5)->create();

        // Create farmers and associate them with farms and harvests
        Farmer::factory()->count(10)->create()->each(function ($farmer) {
            // Create 2 farms for each farmer
            $farmer->farms()->createMany(Farm::factory()->count(2)->make()->toArray());

            // Create 3 harvests for each farmer
            $farmer->harvests()->createMany(Harvest::factory()->count(3)->make()->toArray());
        });

        // Create transactions and payments for the farmers
        Transaction::factory()->count(15)->create()->each(function ($transaction) {
            // Create 2 payments for each transaction
            Payment::factory()->count(2)->create(['transaction_id' => $transaction->id]);
        });
    }
}
