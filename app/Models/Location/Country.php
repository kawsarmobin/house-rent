<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['country'];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
