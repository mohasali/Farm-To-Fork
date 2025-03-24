<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemOrder>
 */
class ItemOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'box_id' => fake()->numberBetween(1, 25),
            'quantity' => fake()->numberBetween(1, 5),
            'returned' => fake()->boolean(10),
        ];
    }
}
