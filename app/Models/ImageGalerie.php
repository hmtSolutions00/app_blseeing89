<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGalerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'galeri_id',
        'image_url',
    ];
    public function galeri()
    {
        return $this->belongsTo(Galerie::class, 'galeri_id');
    }
}
