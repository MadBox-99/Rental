<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Car;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::all()->each(function ($car): void {
            $car->attributes()->attach(
                Attribute::factory()->count(3)->create()->pluck('id')->toArray()
            );
        });
    }
}
