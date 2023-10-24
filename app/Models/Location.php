<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class);
    }

    public function detail_shops(): HasMany
    {
        return $this->hasMany(DetailShop::class);
    }

}
