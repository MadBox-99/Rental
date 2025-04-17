<?php

namespace App\Filament\Resources\AvailabilityResource\Pages;

use App\Filament\Resources\AvailabilityResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListAvailabilities extends ListRecords
{
    protected static string $resource = AvailabilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All')->query(fn ($query) => $query),
            'elérhető' => Tab::make()->query(fn ($query) => $query->whereIsAvailable(true)),
            'nem elérhető' => Tab::make()->query(fn ($query) => $query->whereIsAvailable(false)),
        ];
    }
}
