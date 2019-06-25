<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = [
        'startRegisterDate',
        'endRegisterDate',
        'startDate',
        'endDate'
    ];

    public function raceTypeList() {
        return $this->hasMany(RaceType::class, 'event_id');
    }
}
