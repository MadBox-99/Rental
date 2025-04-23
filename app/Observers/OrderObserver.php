<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        if ($order->isDirty(['start_date', 'end_date'])) {
            // Set original start and end date availability to true
            $originalStartDate = $order->getOriginal('start_date');
            $originalEndDate = $order->getOriginal('end_date');
            $order->car->availabilities()
                ->whereBetween('date', [$originalStartDate, $originalEndDate])
                ->update(['is_available' => true]);

            // Set new start and end date availability to false
            $newStartDate = $order->start_date;
            $newEndDate = $order->end_date;
            $order->car->availabilities()
                ->whereBetween('date', [$newStartDate, $newEndDate])
                ->update(['is_available' => false]);
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
