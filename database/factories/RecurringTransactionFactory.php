<?php

namespace Database\Factories;

use App\Models\RecurringTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecurringTransaction>
 */
class RecurringTransactionFactory extends Factory
{
    protected $model = RecurringTransaction::class;

    public function definition()
    {
        return [
            'transaction_id' => \App\Models\Transaction::factory(),
            'frequency' => $this->faker->randomElement(['daily', 'weekly', 'monthly', 'yearly']),
            'interval' => $this->faker->numberBetween(1, 4),
            'start_date' => $this->faker->dateTimeBetween('-1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+1 year'),
            'last_processed' => $this->faker->optional()->dateTimeThisYear(),
        ];
    }
}
