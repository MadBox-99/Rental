<?php

declare(strict_types=1);

namespace App\Filament\Resources\AvailabilityResource\Pages;

use App\Filament\Resources\AvailabilityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAvailability extends CreateRecord
{
    protected static string $resource = AvailabilityResource::class;
}
