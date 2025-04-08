<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'transaction_id' => Transaction::factory(),
            'amount_paid' => $this->faker->randomFloat(2, 10, 500), // Payment amount
            'payment_date' => $this->faker->date,
            'payment_method' => $this->faker->randomElement(['cash', 'bank_transfer', 'mobile_money']),
        ];
    }
}
