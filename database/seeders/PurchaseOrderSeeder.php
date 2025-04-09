<?php

namespace Database\Seeders;

use App\Models\Harvest;
use App\Models\PurchaseOrder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buyers = User::all(); // Or filter with ->where('user_type', 'buyer') if you have that
        $coffees = Harvest::all();

        if ($buyers->isEmpty() || $coffees->isEmpty()) {
            $this->command->info('No buyers or coffees found to seed purchase orders.');
            return;
        }

        foreach ($buyers as $buyer) {
            for ($i = 0; $i < 3; $i++) {
                $coffee = $coffees->random();
                $quantity = rand(5, 50);

                PurchaseOrder::create([
                    'buyer_id'    => $buyer->id,
                    'coffee_id'   => $coffee->id,
                    'quantity'    => $quantity,
                    'price'       => $quantity * $coffee->unit_price,
                    'status'      => ['pending', 'confirmed', 'delivered'][rand(0, 2)],
                    'order_date'  => now()->subDays(rand(0, 30)),
                ]);
            }
        }
    }
}
