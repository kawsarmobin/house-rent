<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['country_id', 'division'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function policeStations()
    {
        return $this->hasMany(PoliceStation::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
