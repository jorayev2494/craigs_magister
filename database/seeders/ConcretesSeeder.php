<?php

namespace Database\Seeders;

use App\Models\Announcements\Base\{Category, Announcement};
use App\Models\User;
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
        // $categories = Category::all();
        // $categories->each(function(Category $category): void {
        //     $category->announcements->each(function(Announcement $announcement) use($category): void {
        //         $announcement->concrete()->save(
        //             resolve($category->getConcreteModel())->factory()->make()
        //         );
        //     });
        // });

        $announcements = Announcement::all();
        $announcements->each(function(Announcement $announcement): void {
            $announcement->concrete()->save(
                resolve($announcement->category->getConcreteModel())->factory()->make()
            );
        });
    }
}
