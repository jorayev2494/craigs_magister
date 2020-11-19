<?php

namespace Tests\Traits;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Trait AttachJWTToken
 */
trait AttachJwtToken
{
    
    /**
    * @var Admin $loginAdmin
    */
    protected ?Admin $loginAdmin;

    /**
    * @var User $loginUser
    */
    protected ?User $loginUser;

    /**
    * @var array $data
    */
    private array $data = [];

    public function setData(array $data = []): self
    {
        $this->data = $data;
        return $this;
    }

    public function get(): Model
    {
        return $this->loginUser ? $this->loginUser : $this->loginAdmin;
    }

    public function actingAsAdmin(Admin $admin = null, array $data = []): self
    {
        $this->loginUser = null;
        $this->loginAdmin = $admin ?: Admin::factory(
                                        array_merge([
                                                'email' => "adminTF@gmail.com", 
                                                'password' => '476674', 
                                                // 'phone' => 48648646846,
                                                'avatar' => "avatar-s-3.jpg",
                                                'role_id' => 1,
                                            ], $data
                                        ))->create();
        return $this;
    }

    public function actingAsUser(User $user = null, array $data = []): self
    {
        $this->loginAdmin = null;
        $this->loginUser = $user ?: User::factory(
                                        array_merge([
                                                'email' => "userTF@gmail.com",
                                                'password' => '476674',
                                                'avatar' => "avatar-s-3.jpg",
                                            ], $data
                                        ))->create();
        return $this;
    }

    protected function getJwtToken(): string
    {
        $authUser = $this->loginUser ? $this->loginUser : $this->loginAdmin;
        return JWTAuth::fromUser($authUser);
    }

    protected function getHeaderJwtToken(string $loginAs = null): array
    {
        return $this->transformHeadersToServerVars([
            'Authorization' => 'Bearer ' . $this->getJwtToken($loginAs),
        ]);
    }

}
