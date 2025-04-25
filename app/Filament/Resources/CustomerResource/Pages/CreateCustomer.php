<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (! isset($data['user_id'])) {
            $data['user_id'] = Auth::user()->id;
        }

        if ($data['user_id'] === null) {
            $data['user_id'] = Auth::user()->id;
        }

        return $data;
    }
}
