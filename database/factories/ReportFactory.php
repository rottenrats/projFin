<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    
    protected $model = Report::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'type' => $this->faker->randomElement(['cash_flow', 'profit_loss', 'balance_sheet']),
            'period_start' => $this->faker->dateTimeBetween('-1 year'),
            'period_end' => $this->faker->dateTimeBetween('-6 months'),
            'parameters' => json_encode([
                'accounts' => $this->faker->randomElements([1,2,3], 2),
                'categories' => $this->faker->randomElements([1,2,3,4], 3)
            ]),
            'data' => json_encode([
                'total_income' => $this->faker->randomFloat(2, 1000, 100000),
                'total_expenses' => $this->faker->randomFloat(2, 1000, 50000),
                'net_profit' => $this->faker->randomFloat(2, -20000, 80000)
            ]),
        ];
    }
}
