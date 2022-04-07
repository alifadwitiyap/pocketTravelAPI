<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class User extends Authenticatable
{
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    use HasApiTokens, HasFactory, Notifiable,AuthenticatableTrait;
    protected $connection='mongodb';
    protected $primaryKey='user_id';



    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        '_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->hasMany(plan::class,'user_id','user_id');
    }
}
