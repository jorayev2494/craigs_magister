<?php

namespace Database\Factories\Announcements\Base;

use App\Models\Announcements\Base\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'          => $slug = $this->faker->slug,
            'model'         => $slug,
            'unblock_date'  => null
        ];
    }
}
