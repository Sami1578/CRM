<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $team = Team::first();
        $user = User::where('name', 'member')->first();
        return [
            'team_id' => $team->id,
            'user_id' => $user->id,
            'name' => fake()->name(),
            'email' => fake()->email(),
            'target' => fake()->numberBetween(1, 10000),
            'commission' => fake()->numberBetween(1, 100),
            'min_sales_required_for_bonus' => fake()->numberBetween(1, 10),
            'bonus_on_acheiving_target' => fake()->numberBetween(1, 100)
        ];
    }
}
