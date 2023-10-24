<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class DetailBrand extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }
}
