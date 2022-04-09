<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class item extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $primaryKey = 'item_id';
    protected $hidden = ['_id'];

    protected $fillable = [
        "item_id",
        "name",
        "is_checked"
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
