<?php

namespace Database\Seeders;

use App\Models\Announcements\Base\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    private array $fakeCategories = [
        'house',
        // 'phone',
        // 'cars'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->fakeCategories as $key => $category) {
            Category::factory()->create([
                'slug'          => $category,
                'model'         => $category
            ]);
        }
    }
}
