<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'country',
        'files', // JSON oszlop a fájlok tárolására
        'born_place', // Születési hely
        'born_year', // Születési év
        'born_month', // Születési hónap
        'born_day', // Születési nap
        'license_number', // Jogosítvány száma
        'license_issue_date', // Jogosítvány kiállításának dátuma
        'license_expiry_date', // Jogosítvány lejárati dátuma
        'id_card_number', // Személyigazolványszám
        'address_number', // házszám
        'address_extra', // emelet/ajtó
        'full_name', // teljes név
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'files' => 'array', // JSON oszlop a fájlok tárolására
        ];
    }
}
