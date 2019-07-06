<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function geography() {
        return $this->belongsTo(Geography::class);
    }

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function districts() {
        return $this->hasMany(District::class);
    }
}
