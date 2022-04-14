<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Diary extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = [
        'user_id',
        'user',
        'country',
        'location',
        'image',
        'caption',
        'isPublic',
    ];
}
