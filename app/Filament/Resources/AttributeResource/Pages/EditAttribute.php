<?php

namespace App\Filament\Resources\AttributeResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\AttributeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttribute extends EditRecord
{
    protected static string $resource = AttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
