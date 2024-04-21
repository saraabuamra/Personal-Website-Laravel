<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function category_images(){
        return $this->belongsTo('App\Models\CategoryImage','category_image_id');
    }
    
}
