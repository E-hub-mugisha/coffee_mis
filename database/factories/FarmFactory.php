<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

class FarmFactory extends Factory
{
    protected $model = Farm::class;

    public function definition(): array
    {
        return [
            'farmer_id' => Farmer::factory(),
            'name' => $this->faker->company,
            'size_in_hectares' => $this->faker->randomFloat(2, 0.5, 10), // Size in hectares
            'location' => $this->faker->address,
        ];
    }
}
