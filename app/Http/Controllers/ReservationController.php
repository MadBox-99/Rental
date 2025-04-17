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

        // Számítsuk ki a foglalás napjait
        $startDate = now()->parse($validated['pickup_time'])->startOfDay();
        $endDate = now()->parse($validated['dropoff_time'])->addDay()->startOfDay();

        // Ellenőrizzük, hogy az autó elérhető-e az adott időszakban
        $availability = Availability::where('car_id', $validated['car_id'])
            ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->where('is_available', true)
            ->count();

        if ($availability < $endDate->diffInDays($startDate) + 1) {
            return response()->json(['error' => 'Car is not available for the selected time.'], 422);
        }

        // Foglalás létrehozása
        $order = Order::create([
            'car_id' => $validated['car_id'],
            'pickup_time' => $validated['pickup_time'],
            'dropoff_time' => $validated['dropoff_time'],
        ]);

        // Az elérhetőség frissítése
        Availability::where('car_id', $validated['car_id'])
            ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->update(['is_available' => false]);

        return response()->json(['message' => 'Reservation created successfully.', 'order' => $order]);
    }

    public function availability()
    {
        $cars = Car::with(['availabilities' => function ($query) {
            $query->whereBetween('date', [now()->startOfDay(), now()->addDays(30)->endOfDay()]);
        }])->get();

        return view('csereauto-flotta', compact('cars'));
    }

    /**
     * Display a specific car's details.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $car = Car::with('availabilities')->findOrFail($id);

        return view('car-details', compact('car'));
    }
}
