<?php

namespace App\Livewire;

use App\Models\Availability;
use App\Models\Car;
use Livewire\Component;

class CarAvailabilityCalendar extends Component
{
    public $availabilities;

    public function mount(Car $car, $displayDays = 30)
    {
        $tmp = Availability::whereCarId($car->id)->whereBetween('date', [today(), today()->addDays($displayDays)->format('Y-m-d')])->firstOrCreate([
            'car_id' => $car->id,
            'date' => today()->addDays($displayDays)->format('Y-m-d'), // Only store the day
        ])->dumpRawSql();
        $this->availabilities = Availability::whereCarId($car->id)->whereBetween('date', [today(), today()->addDays($displayDays - 1)])->dumpRawSql()->get();
        dump($this->availabilities);
    }

    public function render()
    {
        return view('livewire.car-availability-calendar');
    }
}
