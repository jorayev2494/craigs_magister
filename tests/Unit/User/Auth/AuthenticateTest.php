<?php

namespace Tests\Unit\User\Auth;

use App\Models\EmailConfirmation;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @var string $emailConfirmationToken
    */
    private string $emailConfirmationToken;

    /**
    * @var string $passwordResetToken
    */
    private string $passwordResetToken;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function test_register(): void
    {
        $this->withExceptionHandling();

        $data = [
            'password' => $this->password,
            'password_confirmation' => $this->password,
        ];

        $fakeUser =  User::factory()->makeOne();

        $response = $this->json('POST', route('api.auth.register'), array_merge($fakeUser->toArray(), $data)); // ->assertStatus(Response::HTTP_CREATED);
        ['email_confirm_token' => $emailConfirmToken] = $response->decodeResponseJson();
        $this->emailConfirmationToken = $emailConfirmToken;

        $this->assertUserSavedIdDatabase($fakeUser->attributesToArray());

        $this->assertDatabaseHas('email_confirmations', [
                                                            'email' => $fakeUser->email, 
                                                            'token' => $emailConfirmToken
                                                        ]
                                                    );
    }

    /** @test */
    public function test_login(): void
    {
        $data = [
            'email' => 'user1@gmail.com',
            'password' => $this->password,
        ];

        $response = $this->json('POST', route('api.auth.login'), $data)->assertOk();

        $response->assertJsonStructure([
            'access_token',
            'user_data'
        ]);

        ['access_token' => $accessToken, 'user_data' => $userData] = $response->decodeResponseJson();

        $this->assertUserSavedIdDatabase($userData);
        $this->assertNotNull($accessToken);
    }

    /** @test */
    public function test_logout(): void
    {
        $loginUser = $this->actingAsUser()->getHeaderJwtToken();
        $this->json('POST', route('api.auth.logout'), [], $loginUser)->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /** @test */
    public function test_refresh_token(): void
    {
        $result = $this->actingAsUser()->getHeaderJwtToken();
        $this->json('GET', route('api.auth.token_refresh'), [], $result)->assertOk();
    }

    /** @test */
    public function test_email_confirmation(): void
    {
        $this->test_register();
        $data = ['token' => $this->emailConfirmationToken];
        $this->json('PUT', route('api.auth.email_confirmation'), $data)->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDeleted('email_confirmations', $data);
    }

    /** @test */
    public function test_send_reset_token_email(): void
    {
        $registeredUser = $this->actingAsUser()->get();
        $response = $this->json('POST', 
                                route('api.auth.forgot_password.send_reset_token_email'), 
                                Arr::only($registeredUser->attributesToArray(), 'email')
                            )->assertStatus(Response::HTTP_ACCEPTED);

        ['password_reset_token' => $passwordResetToken] = $response->decodeResponseJson();

        $this->assertDatabaseHas(
            'password_resets', ['email' => $this->userEmail, 
            'token' => $this->passwordResetToken = $passwordResetToken]
        );                            
    }
    
    /** @test */
    public function test_reset_password(): void
    {
        $this->test_send_reset_token_email();
        $this->json('PUT', 
                    route('api.auth.forgot_password.reset_password'),
                    [
                        'token' => $this->passwordResetToken,
                        'password' => $this->password,
                        'password_confirmation' => $this->password
                    ]);

        $this->assertDeleted('password_resets', 
                                ['email' => $this->userEmail, 'token' => $this->passwordResetToken]
                            );
    }
    
    

    private function assertUserSavedIdDatabase(array $userData): void
    {
        $this->assertDatabaseHas('users', 
            Arr::only($userData, 
                'id',
                'first_name',
                'last_name',
                'avatar',
                'email',
                'phone',
                'rate',
                'location_country_id',
                'location_city_id',
                'email_confirmed',
                'active',
                'unblock_date',
                'is_verified',
                'about',
                'last_login',
                'is_verified',
                'last_activity',
                'created_at',
                'updated_at'
            )
        );
    }
}
