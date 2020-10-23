<?php

namespace Database\Seeders;

use App\Models\Announcements\Base\{Category, Announcement};
use Illuminate\Database\Seeder;

class ConcretesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $categories->each(function(Category $category) {
            $category->announcements->each(function(Announcement $announcement) use($category) {
                $announcement->concrete()->save(
                    resolve($category->getConcreteModel())->factory()->make()
                );
            });
        });
    }
}
