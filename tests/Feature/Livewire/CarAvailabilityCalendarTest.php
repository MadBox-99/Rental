<?php

use App\Livewire\CarAvailabilityCalendar;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CarAvailabilityCalendar::class)
        ->assertStatus(200);
});
