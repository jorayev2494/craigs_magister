<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{

    private $roles = [
        'super_admin',
        'admin',
        'moderator'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $key => $value) {
            AdminRole::factory()->create(['slug' => $value]);
        }
    }
}
