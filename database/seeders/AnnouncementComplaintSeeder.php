<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AnnouncementComplaint;
use App\Models\Announcements\Base\Announcement;

class AnnouncementComplaintSeeder extends Seeder
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
            $user->announcementComplaints()->saveMany(AnnouncementComplaint::factory()->count(rand(1, 5))->make([
                'announcement_id' => $announcements->random()->id
            ]));
        });
    }
}
