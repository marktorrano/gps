<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable {

    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    protected $visible = [
        'name', 'email', 'photos'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
