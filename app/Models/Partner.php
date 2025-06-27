<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = "partners";
    protected $fillable = ['name','description','logo_path','website_url'];
}
