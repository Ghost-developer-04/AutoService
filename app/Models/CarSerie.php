<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarSerie extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function car_brand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
