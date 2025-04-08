<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\Cooperative;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'farmer_id' => Farmer::factory(),
            'cooperative_id' => Cooperative::factory(),
            'amount' => $this->faker->randomFloat(2, 50, 1000), // Transaction amount
            'transaction_date' => $this->faker->date,
            'type' => $this->faker->randomElement(['sale', 'payment']),
        ];
    }
}
