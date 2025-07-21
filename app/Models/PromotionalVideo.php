<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionalVideo extends Model
{
    protected $table = "promotional_videos";
    protected $fillable = ['path_video','is_show'];
}
