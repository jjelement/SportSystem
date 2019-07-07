<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['user_id', 'event_id', 'deliveryMethod', 'district_id', 'address', 'price', 'paymentMethod', 'paymentDatetime'];

    protected $dates = ['paymentDatetime'];

    public function ticketParticipants() {
        return $this->hasMany(TicketParticipant::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function getProvinceAttribute() {
        return $this->district->province;
    }

    public function getAreaAttribute() {
        return $this->district->area;
    }

    public function getPostalCodeAttribute() {
        return $this->district->area->postcode;
    }
}
