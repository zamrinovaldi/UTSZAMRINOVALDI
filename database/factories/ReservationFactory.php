<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Guest;
use App\Models\Room;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkIn = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $checkOut = (clone $checkIn)->modify('+' . rand(1, 5) . ' days');

        return [
            'guest_id' => Guest::factory(),
            'room_id' => Room::factory(),
            'check_in_date' => $checkIn->format('Y-m-d'),
            'check_out_date' => $checkOut->format('Y-m-d'),
            'total_price' => $this->faker->randomFloat(2, 100, 2500),
        ];
    }
}
