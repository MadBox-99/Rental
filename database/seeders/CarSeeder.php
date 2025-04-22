<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()->create([
            'brand' => 'Skoda',
            'model' => 'Octavia Combi',
            'doors' => 5,
            'fuel' => 'Diesel',
            'transmission' => 'Automatic',
            'horsepower' => 150,
            'year' => 2024,
            'color' => 'Gray',
            'mileage' => 0,
            'license_plate' => 'ABC-123',
            'technical_validity' => now()->addYear(),
            'chassis_number' => 'TS123456789012341',
            'engine_number' => 'TS123456789012341',
            'owner' => 'John Doe',
        ]);
        Car::factory()->create([
            'brand' => 'Skoda',
            'model' => 'Octavia RS',
            'doors' => 5,
            'fuel' => 'Benzine',
            'transmission' => 'Automatic',
            'horsepower' => 265,
            'year' => 2024,
            'color' => 'Gray',
            'mileage' => 0,
            'license_plate' => 'DEF-456',
            'technical_validity' => now()->addYear(),
            'chassis_number' => 'TS123456789012342',
            'engine_number' => 'TS123456789012342',
            'owner' => 'John Doe',
        ]);
        Car::factory()->create([
            'brand' => 'Skoda',
            'model' => 'SuperB',
            'doors' => 5,
            'fuel' => 'Benzine',
            'transmission' => 'Automatic',
            'horsepower' => 150,
            'year' => 2024,
            'color' => 'Black',
            'mileage' => 0,
            'license_plate' => 'GHI-789',
            'technical_validity' => now()->addYear(),
            'chassis_number' => 'TS123456789012343',
            'engine_number' => 'TS123456789012343',
            'owner' => 'John Doe',
        ]);

    }
}
