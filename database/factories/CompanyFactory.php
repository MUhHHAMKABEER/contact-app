<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            return [
                'name' => $this->faker->name,
                'email' => $this->faker->unique()->safeEmail,
                // 'phone' => $this->faker->phoneNumber,
                'website' => $this->faker->url,
                'address' => $this->faker->address,
                'user_id' => 1
            ];

    }
}
