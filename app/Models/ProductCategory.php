<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'slug', 
        'thumbnail', 
        'meta_description', 
        'meta_keywords', 
        'meta_og_title', 
        'meta_og_description', 
        'meta_og_type',
        'label',
        'sortir'
               ];
    public function subcategories()
    {
        return $this->hasMany(ProductSubcategory::class);
    }
    public function products()
{
    return $this->hasManyThrough(
        \App\Models\Product::class,
        \App\Models\ProductSubcategory::class,
        'product_category_id', // Foreign key di tabel subcategories
        'product_subcategory_id', // Foreign key di tabel products
        'id', // Local key di tabel categories
        'id'  // Local key di tabel subcategories
    );
}

}
