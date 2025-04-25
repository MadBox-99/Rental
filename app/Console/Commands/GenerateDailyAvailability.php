<?php

namespace App\Console\Commands;

use App\Models\Availability;
use App\Models\Car;
use Illuminate\Console\Command;

class GenerateDailyAvailability extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'availability:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate availability for all cars for the new day';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $cars = Car::all();

        foreach ($cars as $car) {

            // Create or do nothing if already exists
            Availability::whereBetween('date', [today(), today()->addDays(30)->format('Y-m-d')])->firstOrCreate([
                'car_id' => $car->id,
                'date' => today()->addDays(30)->format('Y-m-d'), // Only store the day
            ]);
        }

        $this->info('Daily availability generated successfully!');
    }
}
