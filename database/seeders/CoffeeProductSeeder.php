<?php

namespace Database\Seeders;

use App\Models\CoffeeProduct;
use App\Models\Harvest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffeeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all harvests
    $harvests = Harvest::all();

    // Check if there are harvests available
    if ($harvests->isEmpty()) {
        $this->command->info('No harvests found to associate with unprocessed coffee products.');
        return;
    }

    // Create 10 random unprocessed coffee products
    foreach (range(1, 10) as $index) {
        // Select a random harvest
        $harvest = $harvests->random();

        // Create a random unprocessed coffee product
        CoffeeProduct::create([
            'name' => 'Unprocessed Green Coffee Beans ' . $index,
            'description' => 'Raw, unroasted coffee beans from the ' . $harvest->name . ' harvest, perfect for roasting at home or for wholesale.',
            'price' => rand(8, 15),  // Random price between 8 and 15
            'quantity' => rand(100, 500),  // Random quantity between 100 and 500
            'harvest_id' => $harvest->id,  // Associate with a random harvest
        ]);
    }

    $this->command->info('10 random unprocessed coffee products created successfully!');
    }
}
