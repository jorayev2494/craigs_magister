<?php

namespace Tests\Generators;

use App\Models\Admin;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AuthenticateTestTrait
{
    public function actingAsAdmin(Admin $admin)
    {
        $token = JWTAuth::fromUser($admin);
        $this->withHeader('Authorization', $token);
        parent::actingAs($admin);
        return $this;
    }
}
