<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'hours',
        'goal',
        'image',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
