<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->lexify('??????') . $this->faker->randomNumber(4, true)), // 10 characters
            'quantity' => $this->faker->numberBetween(1, 500), // Random quantity between 1 and 500
            'percentage' => $this->faker->randomFloat(2, 1, 90), // Random percentage between 1 and 90 (2 decimal places)
            'expiry_date' => $this->faker->dateTimeBetween('now', '+6 months'), // Expiry date within the next 6 months
        ];
    }
}
