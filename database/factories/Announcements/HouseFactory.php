<?php

namespace Database\Factories\Announcements;

use App\Models\Announcements\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total_area'            => rand(2, 28) . 'm2',
            'exchange_possibility'  => $this->faker->boolean,
            'floor'                 => rand(2, 28),
            'property_type'         => 'apartament',
            'number_of_storeys'     => rand(2, 28),
            'quantity_rooms'        => rand(2, 28)
        ];
    }
}
