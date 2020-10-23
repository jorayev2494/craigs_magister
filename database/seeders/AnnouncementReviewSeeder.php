<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, AnnouncementReview};
use App\Models\Announcements\Base\Announcement;

class AnnouncementReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $announcements = Announcement::all();
        
        $users->each(function(User $user) use($announcements) {
            $user->announcementReviews()->saveMany(AnnouncementReview::factory()->count(rand(1, 5))->make([
                'announcement_id' => $announcements->random()->id
            ]));
        });
    }
}
