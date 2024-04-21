<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
    protected $table = 'registercourses'; 

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'gender',
    ];

    public function course(){
        return $this->belongsTo('App\Models\Course','course_id');
    }
}
