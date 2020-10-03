<?php

namespace Test\Unit\Traits;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Trait AttachJWTToken
 */
trait AttachJwtToken
{
    
    /**
    * @var Model $loginUser
    */
    protected ?Model $loginUser;

    public function loginAs(Model $model = null) : ?Model
    {
        $this->loginUser = $model;
        return $this;
    }

    protected function getJwtToken() : string
    {
        $user = $this->loginUser;
        return JWTAuth::fromUser($user);
    }

}
