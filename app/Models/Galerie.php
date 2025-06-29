<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
     use HasFactory;
    protected $fillable = [
        'judul',
        'description',
        'slug',
        'thumbnail',
        'meta_description',
        'meta_keywords',
        'meta_og_title',
        'meta_og_description',
        'meta_og_type',
    ];

    public function imageGaleri()
    {
        return $this->hasMany(ImageGalerie::class, 'galeri_id');
    }
}
