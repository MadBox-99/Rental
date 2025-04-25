<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([OrderObserver::class])]
class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'customer_id',
        'pickup_location_id',
        'dropoff_location_id',
        'pickup_time',
        'dropoff_time',
        'start_date',
        'end_date',
        'own_license_plate',
        'document_contract',
        'document_declaration',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function picupLocation()
    {
        return $this->belongsTo(Location::class, 'pickup_location_id');
    }

    public function dropoffLocation()
    {
        return $this->belongsTo(Location::class, 'dropoff_location_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'document_contract' => 'array',
            'document_declaration' => 'array',
            'pickup_time' => 'datetime',
            'dropoff_time' => 'datetime',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }
}
