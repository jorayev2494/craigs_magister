<?php

namespace Tests\Unit\User\Profile;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @var array $userHeadAuthToken
    */
    private array $userHeadAuthToken;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userHeadAuthToken = $this->actingAsUser()->getHeaderJwtToken();
        $this->withExceptionHandling();
    }
    
    /** @test */
    public function test_profile_show(): void
    {
        $response = $this->json('GET', route('api.profile.show'), [], $this->userHeadAuthToken)->assertOk();
        $response->assertJsonStructure();
        $responseArray = $response->decodeResponseJson();
        $this->assertDatabaseHas('users', ['email' => $responseArray['email']]);
        $this->assertEquals($this->userEmail, $responseArray['email']);
    }

    /** @test */
    public function test_profile_update(): void
    {
        $this->refreshApplication();
        $countries = Country::all();
        $cities = City::all();

        User::all()->each(function($user) use($cities, $countries): void {
            $authResult = $this->actingAsUser($user)->getHeaderJwtToken(true);
            $user = $authResult['data'];

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
                                    route('api.profile.update'), 
                                    $data, 
                                    Arr::except($authResult, 'data')
                                )->assertOk();

            // $response->assertJsonFragment(Arr::except($data, [
            //     'id',
            //     'email',
            //     'avatar', 
            //     'full_name', 
            //     'is_verified',
            //     'updated_at',
            //     'front_end_price'
            // ]));
        });
    }

    /** @test */
    public function test_profile_delete(): void
    {
        $this->refreshApplication();
        $data = $this->actingAsUser()->getHeaderJwtToken(true);
        $this->json('DELETE', route('api.profile.delete'), [], Arr::except($data, 'data'))->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDeleted('users', $data['data']->toArray());
    }
}
