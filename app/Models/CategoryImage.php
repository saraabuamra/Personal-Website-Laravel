<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $table = 'categoryimages'; 

    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function images(){
        return $this->hasMany('App\Models\Image','category_image_id');
    }
}
