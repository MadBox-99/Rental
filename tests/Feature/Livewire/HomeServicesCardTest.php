<?php

use App\Livewire\HomeServicesCard;
use Livewire\Livewire;

it('renders successfully', function (): void {
    Livewire::test(HomeServicesCard::class)
        ->assertStatus(200);
});
