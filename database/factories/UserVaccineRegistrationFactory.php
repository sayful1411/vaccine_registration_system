<?php

namespace Database\Factories;

use App\Models\VaccineCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserVaccineRegistration>
 */
class UserVaccineRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vaccine_center_id' => fake()->numberBetween(1,10),
            'name' => fake()->name(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'nid' => fake()->unique()->randomNumber(10),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
