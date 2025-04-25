<?php

use App\Livewire\CarAvailabilityCalendar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);
it('renders successfully', function (): void {
    $this->seed();
    Livewire::test(CarAvailabilityCalendar::class, ['slug' => 'skoda-octavia-rs', 'displayDays' => 30])
        ->assertStatus(200);
});
