<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FilesStorageSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AdminRoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserReviewSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AnnouncementsSeeder::class);
        $this->call(ConcretesSeeder::class);
        $this->call(AnnouncementReviewSeeder::class);
        $this->call(AnnouncementComplaintSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogSeeder::class);
    }
}
