<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'days',
        'notes',
    ];

    public function program(){
        return $this->belongsTo('App\Models\Program','program_id');
    }


    public function register_course(){
        return $this->hasMany('App\Models\RegisterCourse','course_id');
    }
}
