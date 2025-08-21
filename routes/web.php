<?php

use App\Http\Controllers\ReservationController;
use App\Livewire\CarDetails;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/csereauto-flotta', [ReservationController::class, 'availability'])->name('csereauto-flotta');
Route::view('/berleti-feltetelek', 'berleti-feltetelek')->name('berleti-feltetelek');
Route::view('/szolgaltatasaink', 'szolgaltatasaink')->name('szolgaltatasaink');
Route::view('/csatlakozasi-lehetoseg', 'csatlakozasi-lehetoseg')->name('csatlakozasi-lehetoseg');
Route::view('/kapcsolat', 'kapcsolat')->name('kapcsolat');
Route::view('/szerzodesek', 'szerzodesek')->name('szerzodesek');

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/auto/{slug}', CarDetails::class)->name('cars.show');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
