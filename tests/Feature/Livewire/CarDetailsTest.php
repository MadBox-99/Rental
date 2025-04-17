<?php

use App\Livewire\CarDetails;
use Livewire\Livewire;

it('renders successfully', function () {
    $this->seed(\Database\Seeders\CarSeeder::class);

    Livewire::test(CarDetails::class, ['slug' => 'skoda-octavia-rs'])
        ->assertStatus(200);
});
