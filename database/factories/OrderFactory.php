<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'coupon_id' => null,
            'amount' => fake()->unique()->numberBetween(10, 999),
            'status' => fake()->randomElement(['approved', 'pending', 'canceled']),
            'payment_method' => "card",
            // 'created_at' => fake()->dateTimeBetween('+0 days', '+2 years'),
            // 'created_at' => fake()->dateTimeBetween('-3 years', '- 7 days')
            'created_at' => fake()->dateTimeBetween('- 21 days', 'today')
        ];
    }
}
