<?php

use App\Livewire\CarDetails;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CarDetails::class)
        ->assertStatus(200);
});
