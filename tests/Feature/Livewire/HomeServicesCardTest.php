<?php

use App\Livewire\HomeServicesCard;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(HomeServicesCard::class)
        ->assertStatus(200);
});
