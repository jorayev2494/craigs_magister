<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::all()->each(
            fn(Country $country) => $country->cities()->saveMany(City::factory()->count(rand(2, 10))->make())
        );
    }
}
