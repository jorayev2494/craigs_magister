<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'media_content_id' => null,
            // 'category_id' => $this->blogCategories->random()->id,
            // 'user_id' => 1,
            // 'admin_id' => 1,
            'description' => $this->faker->realText(),
            'status' => $status = Arr::random(Blog::STATUSES),
            'blocked_description' => $status == Blog::STATUS_BLOCKED ? $this->faker->realText() : null,
            'publish' => null
        ];
    }
}
