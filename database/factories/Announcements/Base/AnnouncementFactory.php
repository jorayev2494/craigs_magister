<?php

namespace Database\Factories\Announcements\Base;

use App\Models\Announcements\Base\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $images = [
            'test.jpg',
            'test2.jpg',
            'test3.jpg',
            'test4.jpg',
            'test5.jpg',
        ];

        return [
            'title'                 => $this->faker->title,
            'description'           => $this->faker->realText(200, 4),
            'price'                 => $this->faker->numberBetween(100, 10000),
            'price_per'             => Announcement::PRICE_PER_MONTH,
            'is_price_contractual'  => false,
            'status'                => Announcement::STATUS_APPROVED,
            'location'              => $this->faker->locale,
            'images'                => $images,
            'video'                 => null,
            'viewed'                => 0,
            'unblock_date'          => null
        ];
    }
}
