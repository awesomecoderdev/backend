<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Website>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'user_id' => rand(1, 399),
            'title' => fake()->fullname(),
            'url' => "https://" . Str::slug(fake()->fullname()) . fake()->randomElement(['.com', '.org', '.net']),
            'rest' => "https://" . Str::slug(fake()->fullname()) . fake()->randomElement(['.com', '.org', '.net']),
            'status' => fake()->randomElement(['approved', 'pending', 'blocked']),
        ];
    }
}
