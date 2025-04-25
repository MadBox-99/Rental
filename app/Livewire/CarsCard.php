<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarsCard extends Component
{
    public $cars;

    public function mount(): void
    {

        $this->cars = Car::all();
    }

    public function render()
    {

        return view('livewire.home.cars-card');
    }
}
