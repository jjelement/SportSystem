<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function geography() {
        return $this->belongsTo(Geography::class);
    }

    public function areas() {
        return $this->hasMany(Area::class);
    }

    public function districts() {
        return $this->hasMany(District::class);
    }
}
