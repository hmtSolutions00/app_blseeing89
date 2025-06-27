<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
protected $fillable = [
    'product_category_id',
     'name',
     'thumbnail',
      'description', 
      'meta_keywords',
       'meta_og_title',
        'meta_og_description',
         'meta_og_type'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_subcategory_id');
    }
    public function getThumbnailUrlAttribute()
{
    return $this->thumbnail ? asset($this->thumbnail) : null;
}
}
