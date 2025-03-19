<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Box;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crate>
 */
class BoxFactory extends Factory
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
            'type' => fake()->randomElement(Box::getEnumTypes()),
            'description' => fake()->text(500),
            'price' => fake()->randomFloat(2,10,40),
        ];
    }
}
