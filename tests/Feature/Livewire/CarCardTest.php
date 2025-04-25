<?php

use App\Livewire\CarsCard;
use Livewire\Livewire;

it('renders successfully', function (): void {
    Livewire::test(CarsCard::class)
        ->assertStatus(200);
});
