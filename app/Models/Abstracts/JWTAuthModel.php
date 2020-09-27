<?php

namespace App\Models\Abstracts;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

abstract class JWTAuthModel extends Authenticatable implements JWTSubject {

    use Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function invalidateToken() : bool
    {
        $this->remember_token = null;
        return $this->save();
    }

    public function setPasswordAttribute(string $password) : void
    {
        $this->attributes['password'] = Hash::make($password);
    }
}