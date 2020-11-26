<?php

namespace Tests\Unit\User\My;

use App\Http\Resources\Announcements\AnnouncementResource;
use App\Models\Announcements\Base\Announcement;
use App\Models\Announcements\Base\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnnouncementTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @var User $authUser
    */
    private User $authUser;

    /**
    * @var User $actingAsUser
    */
    private User $actingAsUser;

    /**
    * @var array $headerAccessToken
    */
    private array $headerAccessToken;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAsUser = User::first();
        $authDataToken = $this->actingAsUser($this->actingAsUser)->getHeaderJwtToken(true);
        $this->authUser = $authDataToken['data'];
        $this->headerAccessToken = $authDataToken['header_access_token'];
    }

    /** @test */
    public function test_get_my_announcements(): void
    {
        $response = $this->json('GET', route('api.my.announcements.index'), [], $this->headerAccessToken)->assertOk();

        $arrayOnlyColumns = ['id', 'first_name', 'last_name', 'email', 'rate', 'email_confirmed', 'active'];
        foreach ($response->decodeResponseJson() as $announcement) {
            $announcement = json_decode($announcement, true);
            $ann = array_shift($announcement);

            $this->assertDatabaseHas(
                'announcements', 
                Arr::only(
                    $ann,
                    'id',
                    'title',
                    'description',
                    'price',
                    'price_per',
                    'is_price_contractual',
                    'status',
                    'status_cancelled_description',
                    'rate',
                    'location_google_latitude',
                    'location_google_longitude',
                    'images',
                    'video',
                    'viewed',
                    'unblock_date'
                )
            );

            $this->assertEquals(
                Arr::only(
                    $ann['creator'],
                    $arrayOnlyColumns
                ),
                Arr::only(
                    $this->actingAsUser->toArray(), 
                    $arrayOnlyColumns
                )
            );
        }
    }

    /** @test */
    public function test_create_my_announcements(): void
    {
        $countries = Country::all();
        $cities = City::all();

        Storage::fake('announcement-images');

        foreach (Category::all() as $category) {
            $data = $images = [];

            $fakeAnnouncement = Announcement::factory()->makeOne();

            for ($i=0; $i < random_int(1, 5); $i++) { 
                $images[] = UploadedFile::fake()->image("fake-img{$i}.jpg");
            }

            $data = array_merge(
                $fakeAnnouncement->attributesToArray(),
                [
                    'category_id' => $category->id,
                    'country_id' => $countries->random()->id,
                    'city_id' => $cities->random()->id,
                    Announcement::CONCRETE_PREFIX => $category->getConcreteModel()::factory()->makeOne()->toArray(),
                    'images' => $images,
                    'location_google_latitude' => $randomInt = random_int(50, 1000),
                    'location_google_longitude' => ++$randomInt,
                ]
            );

            $this->json('POST', route('api.my.announcements.store'), $data, $this->headerAccessToken)->assertStatus(Response::HTTP_ACCEPTED);

            $this->assertFileExists(storage_path() . "/app/public/images/announcement/{$category->slug}/");
        }

        $this->assertFileExists(storage_path() . "/app/public/images/announcement/");
    }

    /** @test */
    public function test_get_my_announcement(): void
    {
        $fakeAnnouncement = $this->authUser->announcements->random();
        $response = $this->json('GET', route('api.my.announcements.show', ['announcement' => $fakeAnnouncement->id]), [], $this->headerAccessToken)->assertOk();
        $response->assertJsonStructure();
    }
    
    /** @test */
    public function test_update_my_announcement(): void
    {
        $categories = Category::all();
        $countries = Country::all();
        $cities = City::all();

        Storage::fake('announcement-update-images');

        /**
         * @var Announcement $fakeAnnouncement
         */
        $fakeAnnouncement = $this->authUser->announcements->random();

        /**
         * @var Category $concreteCategory
         */
        $concreteCategory = $categories->random();

        $data = $images = [];
        for ($i=0; $i < random_int(1, 5); $i++) { 
            $images[] = UploadedFile::fake()->image("fake-update-img{$i}.jpg");
        }

        $data = array_merge(
            $fakeAnnouncement->attributesToArray(),
            [ 
                'category_id' => $concreteCategory->id,
                'country_id' => $countries->random()->id,
                'city_id' => $cities->random()->id,
                Announcement::CONCRETE_PREFIX => $concreteCategory->getConcreteModel()::factory()->makeOne()->toArray(),
                'images' => $images,
                'location_google_latitude' => $randomInt = random_int(50, 1000),
                'location_google_longitude' => ++$randomInt,
            ]
        );

        $this->json(
                    'POST', 
                    route('api.my.announcements.update', ['announcement' => $fakeAnnouncement->id]), 
                    array_merge($data, ['_method' => 'PUT']), 
                    $this->headerAccessToken
                )->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertDatabaseHas(
            'announcements', 
            Arr::only(
                $fakeAnnouncement->refresh()->attributesToArray(),
                'id', 
                'title', 
                'description', 
                'price', 
                'price_per', 
                'is_price_contractual', 
                'status',
                'status_cancelled_description',
                'rate',
                'category_id',
                'creator_id',
                'location',
                'location_country_id',
                'location_city_id',
                'location_google_latitude',
                'location_google_longitude',
                'images',
                'video',
                'viewed',
                'unblock_date',
                'created_at',
                'updated_at',
            )
        );

        $this->assertDatabaseHas(
            resolve($fakeAnnouncement->category->getConcreteModel())->getTable(),
            Arr::only(
                $fakeAnnouncement->concrete->refresh()->toArray(),
                'id',
                'announcement_id',
                'total_area',
                'exchange_possibility',
                'property_type',
                'number_of_storeys',
                'floor',
                'quantity_rooms'
            )
        );
    }

    /** @test */
    public function test_delete_my_announcement(): void
    {
        /**
         * @var Announcement $fakeAnnouncement
         */
        $fakeAnnouncement = $this->authUser->announcements->random();
        $fakeConcrete = $fakeAnnouncement->concrete;

        $this->json(
            'DELETE', 
            route(
                'api.my.announcements.destroy', 
                ['announcement' => $fakeAnnouncement->id]
            ),
            [],
            $this->headerAccessToken
        )->assertNoContent();

        $this->assertDeleted(
            'announcements', 
            Arr::only(
                $fakeAnnouncement->attributesToArray(),
                'id', 
                'title', 
                'description', 
                'price', 
                'price_per', 
                'is_price_contractual', 
                'status',
                'status_cancelled_description',
                'rate',
                'category_id',
                'creator_id',
                'location',
                'location_country_id',
                'location_city_id',
                'location_google_latitude',
                'location_google_longitude',
                'images',
                'video',
                'viewed',
                'unblock_date',
                'created_at',
                'updated_at',
            )
        );

        $this->assertDeleted(
            $fakeConcrete->getTable(),
            Arr::only(
                $fakeAnnouncement->concrete->toArray(),
                'id',
                'announcement_id',
                'total_area',
                'exchange_possibility',
                'property_type',
                'number_of_storeys',
                'floor',
                'quantity_rooms'
            )
        );
    }
}
