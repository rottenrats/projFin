<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(['income', 'expense', 'transfer']),
            'color' => $this->faker->hexColor,
            'icon' => $this->faker->randomElement(['shopping-cart', 'home', 'car', 'medkit']),
        ];
    }

    public function incomeType()
    {
        return $this->state([
            'type' => 'income',
        ]);
    }

    public function expenseType()
    {
        return $this->state([
            'type' => 'expense',
        ]);
    }
}
