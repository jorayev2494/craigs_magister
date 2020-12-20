<?php

namespace Database\Seeders;

use App\Models\Announcements\Base\Announcement;
use App\Models\Announcements\Base\Category;
use App\Models\{User, Country, City};
use Illuminate\Database\Seeder;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        /**
         * @parm Collection $categories, $countries
         */
        $categories = Category::all();

        $countries = Country::all();
        $cities = City::all();

        $users->each(function(User $user) use($categories, $countries, $cities): void {
            foreach ($categories as $category) {
                
                $images = $category->slug == 'house' ? [
                    'house_' . random_int(1, 30) . '.jpg',
                    'house_' . random_int(1, 30) . '.jpg',
                    'house_' . random_int(1, 30) . '.jpg',
                    'house_' . random_int(1, 30) . '.jpg',
                    'house_' . random_int(1, 30) . '.jpg',
                ] : [
                    'car_' . random_int(1, 30) . '.jpg',
                    'car_' . random_int(1, 30) . '.jpg',
                    'car_' . random_int(1, 30) . '.jpg',
                    'car_' . random_int(1, 30) . '.jpg',
                    'car_' . random_int(1, 30) . '.jpg',
                ];
                
                $user->announcements()->saveMany(
                    Announcement::factory()->count(rand(1, 15))->make([
                                                                        'category_id' => $category->id,
                                                                        'country_id' => $countries->random()->id,
                                                                        'city_id' => $cities->random()->id,
                                                                        'images' => $images
                                                                    ])
                );
            }
        });
    }
}
