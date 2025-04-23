<?php

namespace Database\Seeders;

use App\Models\Availability;
use App\Models\Car;
use Illuminate\Database\Seeder;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all();

        foreach ($cars as $car) {
            // Add availability for the past 15 years
            for ($i = 0; $i < 15 * 365; $i++) {
                Availability::create([
                    'car_id' => $car->id,
                    'date' => now()->subDays($i + 1)->format('Y-m-d'), // Subtract days for past dates
                    'is_available' => (bool) random_int(0, 1), // Random true or false
                ]);
            }

            // Add availability for the next 15 years
            for ($i = 0; $i < 15 * 365; $i++) {
                Availability::create([
                    'car_id' => $car->id,
                    'date' => now()->addDays($i)->format('Y-m-d'), // Add days for future dates
                    'is_available' => (bool) random_int(0, 1), // Random true or false
                ]);
            }
        }
    }
}
