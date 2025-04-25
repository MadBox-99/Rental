<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function (): void {
    Artisan::call('availability:generate');
})->dailyAt('00:00')->timezone('Europe/Budapest')->name('Generate daily availability');
