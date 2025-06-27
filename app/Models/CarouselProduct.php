<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarouselProduct extends Model
{
    protected $table = "carousel_products";
    protected $fillable = ["product_id", "carousel_id"];
}
