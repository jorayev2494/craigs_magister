<?php

namespace Database\Factories;

use App\Models\AnnouncementComplaint;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AnnouncementComplaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'       => $this->faker->realText,
            'status'            => AnnouncementComplaint::STATUS_WAITING
        ];
    }
}
