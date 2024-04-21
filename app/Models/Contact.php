<?php

namespace App\Models;

use App\Mail\ContactMail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'mobile',
        'subject',
        'message',
    ];

     public static function boot(){
        parent::boot();
        static::created(function($item){
        $user = $item->user;
        if ($user && $user->email) {
        Mail::to($user->email)->send(new ContactMail($item));
        }
        });
     }

     public function user()
     {
         return $this->belongsTo('App\Models\User','id');
     }
}
