<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class plan extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $primaryKey = 'plan_id';
    protected $dates = ['tanggal'];
    protected $hidden = ['_id'];

    protected $fillable = [
        'user_id',
        'plan_id',
        'tanggal',
        'negara',
        'lokasi',
        'jadwal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
