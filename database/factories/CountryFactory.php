<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "slug"          => $this->faker->country,
            "code"          => rand(5, 999),
            "iso_code"      => $this->faker->countryISOAlpha3,
            "unblock_date"  => null,
        ];
    }
}
