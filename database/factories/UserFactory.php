<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'            => $this->faker->name,
            'last_name'             => $this->faker->lastName,
            'email'                 => $this->faker->unique()->email,
            'phone'                 => $this->faker->e164PhoneNumber,
            // 'email_verified_at'     => now(),
            'password'              => 'secreT1235',    // password
            'remember_token'        => Str::random(10),
        ];
    }
}
