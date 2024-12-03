<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'postcode'=>$this->faker->postcode(),
            'country'=> 'GB',
            'city'          => $this->faker->city,
            'address_line1'=>$this->faker->streetAddress(),
            'county'=>fake()->randomElement(['West Midlands','East Midlands','Greater Manchester','Yorkshire'])


        ];
    }
}
