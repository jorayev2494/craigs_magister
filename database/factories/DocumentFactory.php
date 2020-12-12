<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'type',
            'path' => 'path',
            'name' => 'name',
            'user_file_name' => 'user_file_name',
            'size' => random_int(100, 10000),
            'mime_type' => 'image/jpeg'
        ];
    }
}
