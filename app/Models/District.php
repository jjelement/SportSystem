<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function geography() {
        return $this->belongsTo(Geography::class);
    }

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function area() {
        return $this->belongsTo(Area::class);
    }
}
