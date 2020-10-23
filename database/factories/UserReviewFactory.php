<?php

namespace Database\Factories;

use App\Models\UserReview;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserReview::class;

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
