<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'type' => fake()->company(),
            'target' => fake()->numberBetween(1, 10000),
            'commission' => fake()->numberBetween(1, 10),
            'min_sales_required_for_bonus' => fake()->numberBetween(1, 10000)
        ];
    }
}
