<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->word . ' Account',
            'type' => $this->faker->randomElement(['cash', 'bank', 'credit', 'investment']),
            'balance' => $this->faker->randomFloat(2, 0, 100000),
            'currency' => $this->faker->randomElement(['RUB']),
            'is_active' => $this->faker->boolean(90),
        ];
    }

    public function inactive()
    {
        return $this->state([
            'is_active' => false,
        ]);
    }
}
