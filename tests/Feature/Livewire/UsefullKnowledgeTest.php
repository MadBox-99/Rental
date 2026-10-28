<?php

declare(strict_types=1);

use App\Livewire\UsefullKnowledge;
use Livewire\Livewire;

it('renders successfully', function (): void {
    Livewire::test(UsefullKnowledge::class)
        ->assertStatus(200);
});
