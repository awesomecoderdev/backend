<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sender_id = 2;
        return [
            'user_id' => fake()->randomElement([$sender_id, fake()->randomElement([3, 5, 6, 7, 8, 9])]),
            'receiver_id' => fake()->randomElement([$sender_id, fake()->randomElement([3, 5, 6, 7, 8, 9])]),
            'message' => fake()->text(),
            'created_at' => fake()->dateTimeBetween('-3 years', 'today')
        ];
    }
}
