<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        $rand = fake()->numberBetween(1, 226);
//        $country = DB::table('countries')->where('id', $rand)->first();
//        $state = DB::table('states')->where('country_id', $rand)->first();
//        $city = DB::table('cities')->where('state_id', $rand)->first();
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'business_name' => fake()->company(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'country_id' => fake()->numberBetween(1, 226),
            'state_id' => fake()->numberBetween(1, 5046),
            'city_id' => fake()->numberBetween(1, 149535),
            'service_id' => fake()->numberBetween(1, 10),
            'member_id' => 7,
            'zipcode' => fake()->postcode(),
            'street' => fake()->streetName(),
            'address' => fake()->address(),
            'revenue' => fake()->numberBetween(100, 100000),
            'lead_stage_id' => fake()->numberBetween(1, 4),
            'lead_status_id' => fake()->numberBetween(1, 3),
            'call_back_time' => fake()->dateTime(),
        ];
    }
}
