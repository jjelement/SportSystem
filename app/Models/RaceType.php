<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaceType extends Model
{
    protected $fillable = ['name', 'price', 'maxParticipants'];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
