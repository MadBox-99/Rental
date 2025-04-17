<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($car) {
            $car->slug = Str::slug($car->brand.'-'.$car->model);
        });
    }

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
        'slug', // Add slug to fillable fields
        'description',
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
