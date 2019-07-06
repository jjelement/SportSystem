<?php

namespace App\Models;

use App\Models\UserAdmin;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username', 'password', 'firstName', 'lastName',
        'passportNo', 'email', 'tel', 'tel2', 'gender',
        'district_id', 'address',
        'healthIssue', 'bloodType', 'birthdate'
    ];

    protected $hidden = ['password'];

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function isAdmin() {
        $admin = UserAdmin::where('user_id', $this->id)->first();
        return $admin != null;
    }
}
