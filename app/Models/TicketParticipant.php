<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketParticipant extends Model
{
    protected $fillable = [
        'ticket_id', 'race_type_id', 'firstName', 'lastName', 'email', 'tel',
        'passportNo', 'gender', 'birthdate', 'healthIssue', 'bloodType',
        'contactName', 'contactRelationship', 'contactPhoneNumber',
        'shirtType', 'shirtSize'
    ];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function raceType() {
        return $this->belongsTo(RaceType::class);
    }
}
