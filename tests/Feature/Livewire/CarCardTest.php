<?php

use App\Livewire\CarsCard;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CarsCard::class)
        ->assertStatus(200);
});
