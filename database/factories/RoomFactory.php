<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_number' => $this->faker->unique()->numerify('Room-###'),
            'room_type' => $this->faker->randomElement(['Standard', 'Deluxe', 'Suite']),
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
            'status' => $this->faker->randomElement(['available', 'booked', 'maintenance']),
        ];
    }
}
