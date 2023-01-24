<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plans = [
            [
                'name' => 'Essential Plan',
                'slug' => 'essential',
                'stripe_plan' => 'price_1MTqE5IX4CRni5u35rSFUll9',
                'price' => 10,
                'description' => 'Essential Plan'
            ],
            [
                'name' => 'Premium Plan',
                'slug' => 'premium',
                'stripe_plan' => 'price_1MTqEdIX4CRni5u3WVOmOF4K',
                'price' => 20,
                'description' => 'Premium'
            ],
            [
                'name' => 'Business Plan',
                'slug' => 'business',
                'stripe_plan' => 'price_1MTqCoIX4CRni5u3lkDwE1Le',
                'price' => 20,
                'description' => 'Business Plan'
            ],
        ];

        Plan::insert($plans);

        // foreach ($plans as $plan) {
        //     Plan::create($plan);
        // }
    }
}
