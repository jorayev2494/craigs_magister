<?php

namespace Tests\Unit\Admin\Auth;

use App\Models\Admin;
use App\Models\EmailConfirmation;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @var string $email
    */
    private string $email = 'admin@gmail.com';


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
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register(): void
    {
        $this->withExceptionHandling();
        $data = [
            'first_name' => 'Unit',
            'last_name' => 'Last',
            'email' => 'prefix_' . $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password
        ];

        $response = $this->json('POST', route('api.admin.auth.register'), $data)->assertStatus(Response::HTTP_CREATED);

        $response->assertJsonStructure(
            [
                'email_confirm_token'
            ]
        );

        $responseArray = $response->decodeResponseJson();
        $this->emailConfirmationToken = $responseArray['email_confirm_token'];

        $this->assertDatabaseHas('admins', Arr::except($data, ['password', 'password_confirmation']));
        $this->assertDatabaseHas('email_confirmations', array_merge(
                                        [
                                            'email' => $data['email']
                                        ], 
                                        [
                                            'token' => $this->emailConfirmationToken
                                        ]
                                    )
                                );

        $this->assertFalse(Admin::whereEmail($data['email'])->first()->email_confirmed);
    }

    public function test_login(): void
    {
        $data = [
            'email' => 'admin@gmail.com',
            'password' => $this->password,
        ];

        $response = $this->json('POST', route('api.admin.auth.login'), $data)->assertOk();
        $this->assertDatabaseHas('admins', ['email' => 'admin@gmail.com']);

        $response->assertJsonStructure()->assertJsonStructure(
            [
                'access_token',
                'user_data'
            ]
        );
    }

    /** @test */
    public function test_email_confirmation(): void
    {
        $this->test_register();

        $registeredEmail = EmailConfirmation::whereToken($this->emailConfirmationToken)->first()->email;

        $this->json('PUT', route('api.admin.auth.email_confirmation'), [
            'token' => $this->emailConfirmationToken,
        ])->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertNotFalse(Admin::whereEmail($registeredEmail)->first()->email_confirmed);

        $this->assertDeleted('email_confirmations', [
            'email' => $this->email,
            'token' => $this->emailConfirmationToken,
        ]);
    }

    /** @test */
    public function test_refresh_token(): void
    {
        $this->refreshApplication();
        $result = $this->actingAsAdmin()->setData()->getHeaderJwtToken();
        $response = $this->json('GET', route('api.admin.auth.token_refresh'), [], $result)->assertOk();
        $response->assertJsonCount(1)->assertJsonStructure(['token']);
        $responseArray = $response->decodeResponseJson();
        $this->assertSame($result['HTTP_AUTHORIZATION'], 'Bearer ' . $responseArray['token']);
    }

    /** @test */
    public function test_logout(): void
    {
        $this->refreshApplication();
        $result = $this->actingAsAdmin()->getHeaderJwtToken();
        $this->json('POST', route('api.admin.auth.logout'), [], $result)->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /** @test */
    public function test_forgot_password_email(): void
    {
        $data = ['email' => $this->email];

        $response = $this->json('POST', route('api.admin.auth.forgot_password.send_reset_token_email'), $data)
                            ->assertStatus(Response::HTTP_ACCEPTED);

        $response->assertJsonStructure(['password_reset_token']);
        $responseArray = $response->decodeResponseJson();
        $this->passwordResetToken = $responseArray['password_reset_token'];

        $this->assertDatabaseHas('password_resets', array_merge($data, [
            'token' => $this->passwordResetToken
        ]));

        $result = PasswordReset::where('token', $this->passwordResetToken)->first();
        $this->assertSame($result->email, $data['email']);
    }

    /** @test */
    public function test_forgot_password_reset_password(): void
    {
        $this->test_forgot_password_email();

        $data = [
            'token' => $this->passwordResetToken,
            'password' => $this->password . '_Tp',
            'password_confirmation' => $this->password . '_Tp',
        ];

        $this->json('PUT', route('api.admin.auth.forgot_password.reset_password'), $data)
                        ->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertDeleted('password_resets', [
            'email' => $this->email,
            'token' => $this->passwordResetToken
        ]);
    }   
}
