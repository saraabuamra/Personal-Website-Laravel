<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function categories(){
        $getCategories = Category::with('program')->get()->toArray();
        return $getCategories;
    }

    public function program(){
        return $this->belongsTo('App\Models\Program','id');
    }
    
}
