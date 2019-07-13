<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = ['country_id', 'division_id', 'city_id', 'police_station_id', 'village'];

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

    public function policeStation()
    {
        return $this->belongsTo(PoliceStation::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }
}