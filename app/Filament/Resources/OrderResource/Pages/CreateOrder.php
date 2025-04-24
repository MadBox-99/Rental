<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Availability;
use App\Models\Car;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (! isset($data['user_id'])) {
            $data['user_id'] = Auth::user()->id;
        }
        if ($data['user_id'] === null) {
            $data['user_id'] = Auth::user()->id;
        }
        // Check if any availability is false between start_date and end_date
        $availability = Availability::whereCarId($data['car_id'])->whereBetween('date', [$data['start_date'], $data['end_date']])
            ->where('is_available', false)
            ->exists();

        if ($availability) {
            Notification::make()
                ->title('Hiba')
                ->body('A kiválasztott időszakban az autó nem elérhető.')
                ->danger()
                ->send();

            $this->halt();
        }
        // Set availability to false for the selected date range
        Car::find($data['car_id'])->availabilities()
            ->whereBetween('date', [$data['start_date'], $data['end_date']])
            ->each(function ($availability) {
                $availability->update([
                    'is_available' => false,
                ]);

            });

        return $data;
    }
}
