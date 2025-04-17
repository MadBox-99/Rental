<?php

use App\Livewire\CarAvailabilityCalendar;
use Livewire\Livewire;

it('renders successfully', function () {
    $this->seed(\Database\Seeders\CarSeeder::class);
    $this->seed(\Database\Seeders\AvailabilitySeeder::class);
    Livewire::test(CarAvailabilityCalendar::class, ['slug' => 'skoda-octavia-rs', 'displayDays' => 30])
        ->assertStatus(200);
});
