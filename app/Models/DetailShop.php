<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class DetailShop extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }
}
