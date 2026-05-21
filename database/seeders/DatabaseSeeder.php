<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Creating reservations will automatically create Guests and Rooms
        // because of the factory definitions.
        Reservation::factory(20)->create();
    }
}
