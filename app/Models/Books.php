<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Books extends Model
{
    use HasApiTokens, HasFactory, Notifiable ;

    public $timestamps = FALSE;
    
    protected $fillable = [
       'authorid',
       'title',
       'ISBN',
       'pub_year',
       'available',
    ];
}
