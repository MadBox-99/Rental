<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'slug',
        'short_description',
        'description',
        'license_plate',
        'technical_validity',
        'chassis_number',
        'engine_number',
        'owner',
        'images',
    ];

    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function carAttributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    public function isAvailable($date): bool
    {
        return $this->availabilities()
            ->where('is_available', true)
            ->where('date', $date)
            ->exists();
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
