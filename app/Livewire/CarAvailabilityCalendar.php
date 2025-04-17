<?php

namespace App\Livewire;

use App\Models\Availability;
use App\Models\Car;
use Livewire\Component;

class CarAvailabilityCalendar extends Component
{
    public $availabilities;

    public function mount(Car $car, $displayDays)
    {
        $this->availabilities = Availability::whereCarId($car->id)->whereBetween('date', [today(), today()->addDays($displayDays - 1)])->get();
    }

    public function render()
    {
        return view('livewire.car-availability-calendar');
    }
}
