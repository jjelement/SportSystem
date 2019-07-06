<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Geography extends Model
{
    public function province() {
        return $this->hasMany(Province::class);
    }

    public function areas() {
        return $this->hasMany(Area::class);
    }

    public function districts() {
        return $this->hasMany(District::class);
    }
}
