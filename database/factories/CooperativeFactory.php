<?php

namespace Database\Factories;

use App\Models\Cooperative;
use Illuminate\Database\Eloquent\Factories\Factory;

class CooperativeFactory extends Factory
{
    protected $model = Cooperative::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
        ];
    }
}
