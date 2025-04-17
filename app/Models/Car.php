<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'transmission',
        'horsepower',
        'mileage',
        'year',
        'fuel',
        'color',
        'doors',
    ];

    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'images' => 'array',
            'horsepower' => 'integer',
            'mileage' => 'integer',
            'year' => 'integer',
            'doors' => 'integer',
        ];
    }
}
