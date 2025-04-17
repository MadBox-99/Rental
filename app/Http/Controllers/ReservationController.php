<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Car;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ReservationController extends BaseController
{
    /**
     * Store a new reservation.
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'pickup_time' => 'required|date|after:now',
            'dropoff_time' => 'required|date|after:pickup_time',
        ]);

        $availability = Availability::where('car_id', $validated['car_id'])
            ->where('is_available', true)
            ->where('start_time', '<=', $validated['pickup_time'])
            ->where('end_time', '>=', $validated['dropoff_time'])
            ->first();

        if (! $availability) {
            return response()->json(['error' => 'Car is not available for the selected time.'], 422);
        }

        // Create the order
        $order = Order::create([
            'car_id' => $validated['car_id'],
            'pickup_time' => $validated['pickup_time'],
            'dropoff_time' => $validated['dropoff_time'],
        ]);

        // Mark availability as unavailable for 1 hour after dropoff
        $availability->markUnavailableForOneHour();

        return response()->json(['message' => 'Reservation created successfully.', 'order' => $order]);
    }

    public function availability()
    {
        $cars = Car::with(['availabilities' => function ($query) {
            $query->whereBetween('date', [now()->startOfDay(), now()->addDays(30)->endOfDay()]);
        }])->get();

        return view('csereauto-flotta', compact('cars'));
    }
}
