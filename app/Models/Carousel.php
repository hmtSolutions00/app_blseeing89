<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = "carousels";
    protected $fillable = ["judul","url_images", "thumbnail","deskripsi",'status',"meta_description","meta_keywords","meta_og_title","meta_og_description","meta_og_type"];
}
