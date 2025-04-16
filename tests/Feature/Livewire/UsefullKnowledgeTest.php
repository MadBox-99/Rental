<?php

use App\Livewire\UsefullKnowledge;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UsefullKnowledge::class)
        ->assertStatus(200);
});
