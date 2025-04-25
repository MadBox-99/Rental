<?php

use App\Livewire\CarDetails;
use Database\Seeders\CarSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);
it('renders successfully', function (): void {

    $this->seed(CarSeeder::class);

    Livewire::test(CarDetails::class, ['slug' => 'skoda-octavia-rs'])
        ->assertStatus(200);
});
