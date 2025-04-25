<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

uses(RefreshDatabase::class);

test('guests are redirected to the login page', function (): void {
    $this->get('/dashboard')->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function (): void {
    $this->actingAs(User::factory()->create());

    $this->get('/')->assertStatus(200);
});
