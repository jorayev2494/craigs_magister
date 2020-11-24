<?php

namespace Tests\Unit\Admin\Managements;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UserManagementTest extends TestCase
{

    /**
    * @var array $loginHeadAdminToken
    */
    private array $loginHeadAdminToken;

    protected function setUp(): void
    {
        parent::setUp();
        $this->loginHeadAdminToken = $this->actingAsAdmin()->getHeaderJwtToken();
    }

    /** @test */
    public function test_get_users(): void
    {
        $response = $this->json('GET', route('api.admin.management.users.index'), [], $this->loginHeadAdminToken)->assertOk();
        $response->assertJsonStructure();
    }

    /** @test */
    public function test_get_user(): void
    {
        User::all()->each(function($user): void {
            $response = $this->json('GET', 
                                    route('api.admin.management.users.show', ['user' => $user->id]), 
                                    [],
                                    $this->loginHeadAdminToken
                                )->assertOk();

            $response->assertJsonFragment(Arr::except($user->attributesToArray(), ['avatar', 'location_city_id', 'location_country_id', 'created_at', 'updated_at']));
        });
    }

    /** @test */
    public function test_update_user(): void
    {
        $countries = Country::all();
        $cities = City::all();
        
        User::all()->each(function($user) use($countries, $cities): void {
            $data = array_merge($user->attributesToArray(), [
                'first_name' => 'updated_' . $user->first_name, 
                'last_name' => 'updated_' . $user->last_name, 
                'email' => 'updated_' . $user->email,
                'location_country_id' => $countries->random()->id, 
                'location_city_id' => $cities->random()->id,
                'is_verified' => !$user->is_verified,
                'about' => 'Updated ' . $user->about,
            ]);

            $response = $this->json('PUT', 
                                    route('api.admin.management.users.update', ['user' => $user->id]), 
                                    $data,
                                    $this->loginHeadAdminToken
                                );
                                
            $response->assertJsonFragment(Arr::except($data, [
                'updated_at', 
                'avatar', 
                'created_at', 
                'full_name', 
                'is_verified',
                'location_country_id',
                'location_city_id',
            ]));
        });
    }

    /** @test */
    public function test_delete_user(): void
    {
        User::all()->each(
                            fn($user) => $this->json('DELETE', 
                                                    route('api.admin.management.users.destroy', ['user' => $user->id]), 
                                                    [], 
                                                    $this->loginHeadAdminToken
                                                    )->assertStatus(Response::HTTP_NO_CONTENT)
                            );
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function test_update_avatar(): void
    {
        Storage::fake('fake-avatar');
        User::all()->each(function($user): void { 
            $oldAvatar = $user->avatar;
            $this->json('POST', 
                        route('api.admin.management.users.update.user_avatar', ['id' => $user->id]),
                        [
                            'uploaded_avatar' => UploadedFile::fake()->image('avatar.jpg')
                        ],
                        array_merge($this->loginHeadAdminToken, [
                                'Content-Type' => 'multipart/from-data',
                                // 'Content-Type' => 'application/json',
                            ])
                    )->assertStatus(Response::HTTP_ACCEPTED);

            $user->refresh();
            $getUploadedAvatarName = str_replace('/images/portrait/small/', null, $user->avatar);
            $this->assertFileExists(storage_path() . '/app/public/images/portrait/small/' . $getUploadedAvatarName);
            $this->assertNotEquals($oldAvatar, $user->avatar);
        });
    }
}
