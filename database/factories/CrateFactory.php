<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crate>
 */
class CrateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['All Greens','Summer Fruits','Spanish Special','Classic Salad']),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2,10,40),
            'expiryDate' => fake()->dateTimeBetween('+2 days','+1 week'),
            'imagePath' => '/images/crate.jpg'

        ];
    }
}
