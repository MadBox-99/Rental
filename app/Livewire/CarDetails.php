<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarDetails extends Component
{
    public $car;

    public function mount($slug)
    {
        $this->car = Car::whereSlug($slug)->first();
    }

    public function render()
    {
        return view('livewire.car.car-details');
    }
}
