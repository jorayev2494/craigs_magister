<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserReview;
use Illuminate\Database\Seeder;

class UserReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();
        $users->each(function(User $user) use($users): void {
            $randUsers = $users->random(5);

            $randUsers->each(function(User $usr) use($user): void {
                if ($usr->id != $user->id) {
                    $user->reviews()->saveMany(UserReview::factory(['creator_id' => $usr->id])->count(rand(1, 5))->make());
                }
            });

        });
    }
}
