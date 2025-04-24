<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Availability;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('Szerződés generálása')
                ->action(function (Order $order) {

                    $pdf = Pdf::loadView('pdf.order.contact', ['order' => $order], encoding: 'UTF-8');
                    $pdf->setPaper('A4', 'portrait');
                    $pdf->setOption('isHtml5ParserEnabled', true);
                    $pdf->setOption('isUnicodeEnabled', true);
                    // Save the PDF to a temporary location
                    $filePath = 'pdfs/orders/'.uniqid().'.pdf';
                    Storage::disk('public')->put($filePath, $pdf->output());

                    // Return the URL to the frontend
                    return redirect(Storage::url($filePath));
                }),
            Action::make('Nyilatkozat generálása')
                ->action(function (Order $order) {

                    $pdf = Pdf::loadView('pdf.order.declaration', ['order' => $order], encoding: 'UTF-8');
                    $pdf->setPaper('A4', 'portrait');
                    $pdf->setOption('isHtml5ParserEnabled', true);
                    $pdf->setOption('isUnicodeEnabled', true);
                    // Save the PDF to a temporary location
                    $filePath = 'pdfs/orders/'.uniqid().'.pdf';
                    Storage::disk('public')->put($filePath, $pdf->output());

                    // Return the URL to the frontend
                    return redirect(Storage::url($filePath));
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {

        if (! isset($data['user_id'])) {
            $data['user_id'] = Auth::user()->id;
        }
        if ($data['user_id'] === null) {
            $data['user_id'] = Auth::user()->id;
        }

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        // Check if any availability is false between start_date and end_date

        if ($record->start_date !== $data['start_date'] || $record->end_date !== $data['end_date']) {
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
        }

        $record->update($data);

        return $record;
    }
}
