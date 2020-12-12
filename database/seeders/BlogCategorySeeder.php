<?php

namespace Database\Seeders;

use App\Repositories\Eloquent\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategorySeeder extends Seeder
{

    /**
    * @var Collection $categories
    */
    private Collection $categories;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categories = $categoryRepository->all(['slug']);
        // dd($this->categories);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories')->insert($this->categories->toArray());
    }
}
