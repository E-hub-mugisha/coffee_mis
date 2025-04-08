<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\Harvest;
use Illuminate\Database\Eloquent\Factories\Factory;

class HarvestFactory extends Factory
{
    protected $model = Harvest::class;

    public function definition(): array
    {
        return [
            'farmer_id' => Farmer::factory(),
            'harvest_date' => $this->faker->date,
            'coffee_grade' => $this->faker->randomElement(['A1', 'A2', 'B', 'C']),
            'quantity' => $this->faker->randomFloat(2, 1, 50), // Quantity in KG
        ];
    }
}
