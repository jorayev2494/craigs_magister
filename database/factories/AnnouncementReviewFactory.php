<?php

namespace Database\Factories;

use App\Models\AnnouncementReview;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AnnouncementReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating'        => $this->faker->numberBetween(1, 5),
            'description'   => $this->faker->text(),
        ];
    }
}
