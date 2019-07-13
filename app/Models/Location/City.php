<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['country_id', 'division_id', 'city'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function policeStaions()
    {
        return $this->hasMany(PoliceStation::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }
}
