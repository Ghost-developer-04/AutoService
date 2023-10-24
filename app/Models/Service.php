<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
