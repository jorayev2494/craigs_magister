<?php

namespace App\Models\Abstracts;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

abstract class JWTAuthModel extends Authenticatable implements JWTSubject {

    use Notifiable;

    public const AVATAR_DEFAULT_WITH = "45"; // widths, 640px or 320px

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

    // abstract public function getAvatarPath(): string;

    private function getAvatarUrl(): string
    {
        return '/images/avatar/';
    }

    public function getAvatarAttribute(): string
    {
        return $this->getAvatarUrl() . self::AVATAR_DEFAULT_WITH . '/' . $this->attributes['avatar'];
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}