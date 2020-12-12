<?php

namespace Database\Factories;

use App\Models\Announcements\Base\Category;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Repositories\Eloquent\BlogCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogCategory::class;

    

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "slug"          => $this->faker->country,
            "unblock_date"  => null,
        ];
    }
}
