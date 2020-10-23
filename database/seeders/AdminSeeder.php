<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRoles = AdminRole::all();
        foreach ($adminRoles as $key => $role) {
            Admin::factory([
                'email' => "{$role->slug}@gmail.com", 
                'password' => '476674', 
                // 'phone' => 48648646846,
                'avatar' => "avatar-s-{$key}.jpg",
                'role_id' => $role->id,
            ],)->create();
        }
    }
}
