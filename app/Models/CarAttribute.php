<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CarAttribute extends Pivot
{
    public $incrementing = true;

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
