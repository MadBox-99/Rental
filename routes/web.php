<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::view('/csereauto-flotta', 'csereauto-flotta')->name('csereauto-flotta');
Route::view('/berleti-feltetelek', 'berleti-feltetelek')->name('berleti-feltetelek');
Route::view('/szolgaltatasaink', 'szolgaltatasaink')->name('szolgaltatasaink');
Route::view('/csatlakozasi-lehetoseg', 'csatlakozasi-lehetoseg')->name('csatlakozasi-lehetoseg');
Route::view('/kapcsolat', 'kapcsolat')->name('kapcsolat');

require __DIR__.'/auth.php';
