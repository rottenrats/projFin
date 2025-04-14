<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'account_id' => Account::factory(),
            'category_id' => Category::factory(),
            'amount' => $this->faker->randomFloat(2, -1000, 5000),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'currency' => 'USD',
            'description' => $this->faker->sentence,
        ];
    }

    public function income()
    {
        return $this->state([
            'type' => 'income',
            'amount' => $this->faker->numberBetween(100, 10000),
        ]);
    }

    public function expense()
    {
        return $this->state([
            'type' => 'expense',
            'amount' => -$this->faker->numberBetween(100, 5000),
        ]);
    }
}
