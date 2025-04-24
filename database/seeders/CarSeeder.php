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
            'technical_validity_number' => '123456',
            'chassis_number' => 'TS123456789012341',
            'engine_number' => 'TS123456789012341',
            'short_description' => 'Tágas, praktikus és megbízható – ideális választás családoknak vagy ha nagyobb csomagtérre van szüksége a hétköznapokban. Kényelmes utazás, modern felszereltség és gazdaságos fogyasztás jellemzi.',

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
            'technical_validity_number' => 'AB123456',
            'chassis_number' => 'TS123456789012342',
            'engine_number' => 'TS123456789012342',
            'short_description' => 'Ha sportos élményt keres a szervizelés ideje alatt is: dinamikus vezetés, elegáns megjelenés és prémium komfort egyben. Az Octavia RS tökéletes azoknak, akik nem csak helyettesítőt, hanem élményt is szeretnének.',
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
            'technical_validity_number' => 'CD123456',
            'chassis_number' => 'TS123456789012343',
            'engine_number' => 'TS123456789012343',
            'short_description' => 'Felsőkategóriás kényelem a mindennapokra – a Superb csereautóként is luxusérzetet nyújt. Tágas belső tér, fejlett vezetéstámogató rendszerek és kimagasló utazási élmény várja.',
            'owner' => 'John Doe',
        ]);

    }
}
