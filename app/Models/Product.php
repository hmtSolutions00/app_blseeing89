<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_subcategory_id',
        'name',
        'description',
        'slug',
        'price_start',
        'masa_berlaku',
        'thumbnail',
        'images',
        'meta_description',
        'meta_keywords',
        'meta_og_title',
        'meta_og_description',
        'meta_og_type',
        'full_detail'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function subcategory()
    {
        return $this->belongsTo(ProductSubcategory::class, 'product_subcategory_id');
    }
}
