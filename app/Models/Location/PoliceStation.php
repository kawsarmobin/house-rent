<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    protected $fillable = ['country_id', 'division_id', 'city_id', 'police_station'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
