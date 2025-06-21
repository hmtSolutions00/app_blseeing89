<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubDetailProduct extends Model
{
    protected $fillable = [
        'detail_product_id',
        'content',
    ];

    /**
     * Mendapatkan detail produk induk dari sub-detail ini.
     */
   public function detail()
{
    return $this->belongsTo(DetailProduct::class, 'detail_product_id');
}
}
