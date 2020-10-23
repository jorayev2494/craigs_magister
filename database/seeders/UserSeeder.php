<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) { 
            \App\Models\User::factory()->create([
                                                    'email' => "user{$i}@gmail.com",
                                                    'password' => '476674',
                                                    'avatar' => "avatar-s-{$i}.jpg",
                                                ]);
        }
    }
}
