<?php

namespace Database\Factories;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    protected $model = Budget::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'name' => $this->faker->words(3, true),
            'amount' => $this->faker->randomFloat(2, 1000, 100000),
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'RUB']),
            'start_date' => $this->faker->dateTimeBetween('-6 months'),
            'end_date' => $this->faker->dateTimeBetween('now', '+6 months'),
            'threshold' => $this->faker->randomFloat(2, 100, 5000),
        ];
    }
}
