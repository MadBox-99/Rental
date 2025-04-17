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
            for ($i = 0; $i < 30; $i++) {
                Availability::create([
                    'car_id' => $car->id,
                    'date' => now()->addDays($i)->format('Y-m-d'),
                    'hour' => rand(0, 23),
                    'is_available' => rand(0, 1),
                ]);
            }
        }
    }
}
