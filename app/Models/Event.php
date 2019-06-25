<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'profileImage',
        'name',
        'description',
        'content',
        'maxParticipants',
        'startRegisterDate',
        'endRegisterDate',
        'startDate',
        'endDate',
        'isFeature',
        'canWalkIn',
        'shirtType',
        'shirtSize'
    ];

    protected $dates = [
        'startRegisterDate',
        'endRegisterDate',
        'startDate',
        'endDate',
        'created_at',
        'updated_at'
    ];

    public function raceTypeList() {
        return $this->hasMany(RaceType::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function ticketParticipants() {
        return $this->hasManyThrough(TicketParticipant::class, Ticket::class);
    }

}
