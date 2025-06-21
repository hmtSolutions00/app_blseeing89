<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailProduct extends Model
{
     protected $fillable = [
        'product_id',
        'title',
        'content',
    ];

    /**
     * Mendapatkan produk yang memiliki detail ini.
     */
  public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

public function subDetails()
{
    return $this->hasMany(SubDetailProduct::class, 'detail_product_id');
}

    protected static function booted()
{
    static::deleting(function ($detail) {
        $detail->subDetails()->delete();
    });
}
}
