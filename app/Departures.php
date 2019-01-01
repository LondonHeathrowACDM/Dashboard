<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departures extends Model
{
    protected $fillable = ['callsign', 'destination','route','altitude'];

    public function setActiveAttribute($value)
    {
        $this->attributes['active'] = (int) $value;
    }

}
