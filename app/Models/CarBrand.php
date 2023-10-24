<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function car_series(): HasMany
    {
        return $this->hasMany(CarSerie::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
