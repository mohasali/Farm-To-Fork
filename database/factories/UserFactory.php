<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // img array
        $img = [
            '/images/Account/Cow.png',
            '/images/Account/Chicken.png',
            '/images/Account/Horse.png',
            '/images/Account/Pig.png',
            '/images/Account/Rabbit.png',
            '/images/Account/Sheep.png',
        ];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'phone' => fake()->phoneNumber(),
            'remember_token' => Str::random(10),
            'pfp' => $img[array_rand($img)],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function hasOrders(): static
    {
        return $this->afterCreating(function (User $user) {
            Order::factory()->count(fake()->numberBetween(1, 5))->create(['user_id' => $user->id]);
        });
    }
}
