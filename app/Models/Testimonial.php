<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = "testimonials";
    protected $fillable = ['customer_name','testimonial_text','customer_photo_path','is_published'];
}
