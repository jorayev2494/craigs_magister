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
    * @var string $adminEmail
    */
    protected string $adminEmail = 'adminTF@gmail.com';

    /**
    * @var string $userEmail
    */
    protected string $userEmail = 'userTF@gmail.com';

    /**
    * @var string $password
    */
    protected string $password = '476674';

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
        return $this->loginUser ?? $this->loginAdmin;
    }

    public function actingAsAdmin(Admin $admin = null, array $data = []): self
    {
        $this->freshAuth();
        $this->loginAdmin = $admin ?: Admin::factory(
                                        array_merge([
                                                'email' => $this->adminEmail, 
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
        $this->freshAuth();
        $this->loginUser = $user ?: User::factory(
                                        array_merge([
                                                'email' => $this->userEmail,
                                                'password' => $this->password,
                                                'avatar' => "avatar-s-3.jpg",
                                            ], $data
                                        ))->create();
        return $this;
    }

    protected function getJwtToken(): string
    {
        // $authUser = $this->loginUser ? $this->loginUser : $this->loginAdmin;
        return JWTAuth::fromUser($this->get());
    }

    protected function getHeaderJwtToken(bool $withAuthData = false): array
    {
        $authBearerToken = $this->transformHeadersToServerVars(
            ['Authorization' => 'Bearer ' . $this->getJwtToken()]
        );

        if ($withAuthData) {
            $authBearerToken = array_merge(
                $authBearerToken, 
                [
                    'header_access_token' => $authBearerToken,
                    'data' => $this->get()
                ]
            );
        }

        return $authBearerToken;
    }

    private function freshAuth(): void
    {
        $this->loginUser = $this->loginAdmin = null;
    }
}
