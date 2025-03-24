<?php

namespace Database\Factories;

use App\Models\Box;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total' => fake()->randomFloat(2, 20, 200),
            'name' => fake()->name(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'postcode' => fake()->postcode(),
            'country' => fake()->country(),
            'status' => fake()->randomElement(['Pending', 'Processing', 'Shipped', 'Out For Delivery', 'Delivered', 'Completed', 'Canceled', 'Returned']),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            $boxIds = Box::pluck('id')->shuffle()->take(fake()->numberBetween(1, 5));
    
            foreach ($boxIds as $boxId) {
                ItemOrder::create([
                    'order_id' => $order->id,
                    'box_id' => $boxId,
                    'quantity' => fake()->numberBetween(1, 5),
                    'returned' => false,
                ]);
            }
        });
    }
}
