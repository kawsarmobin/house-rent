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
}
