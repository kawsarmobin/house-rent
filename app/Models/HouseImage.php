<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseImage extends Model
{
    protected $fillable = ['house_id', 'image',];

    public function houseInfo()
    {
        return $this->belongsTo(HouseInfo::class, 'id', 'house_id');
    }
}
