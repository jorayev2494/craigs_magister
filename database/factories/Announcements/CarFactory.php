<?php

namespace Database\Factories\Announcements;

use App\Models\Announcements\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cars = ['BMW', 'Mercedes', 'Audi', 'Porsche'];
        $models = ['i3', 'i4', 'i5', 'x3', 'x4', 'x5', 'x6', 'x7'];
        $engines = ['v3', 'v4', 'v5', 'v6', 'v7'];
        $colors = ['red', 'yellow', 'silver', 'blue', 'gray'];

        return [
            'marka'                 => $cars[array_rand($cars)],
            'model'                 => $models[array_rand($models)],
            'year'                  => 20 .random_int(15, 25),
            'engine'                => $engines[array_rand($engines)],
            'color'                 => $colors[array_rand($colors)],
            'transmission'          => $this->faker->boolean ? 'automat' : 'hand',
            'drive_unit'            => $this->faker->boolean ? 'back' : 'front',
            'exchange'              => $this->faker->boolean,
        ];
    }
}
