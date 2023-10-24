<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function detail_shop(): BelongsTo
    {
        return $this->belongsTo(DetailShop::class);
    }

    public function detail_category(): BelongsTo
    {
        return $this->belongsTo(DetailCategory::class);
    }

    public function detail_brand(): BelongsTo
    {
        return $this->belongsTo(DetailBrand::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
