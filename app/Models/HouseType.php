<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    protected $fillable = ['name'];

    public function houseInfo()
    {
        return $this->hasMany(HouseInfo::class);
    }
}
