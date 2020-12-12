<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Document;
use App\Models\User;
use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Eloquent\BlogCategoryRepository;
use App\Repositories\Eloquent\DocumentRepository;
use App\Repositories\Eloquent\UserRepository;
use Highlight\Mode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{

    /**
    * @var Collection $users
    */
    private Collection $users;

    /**
    * @var Collection $admins
    */
    private Collection $admins;

    /**
    * @var Collection $blogCategories
    */
    private Collection $blogCategories;

    /**
    * @var SupportCollection $documents
    */
    private SupportCollection $documents;

    public function __construct(
            UserRepository $userRepository,
            AdminRepository $adminRepository,
            BlogCategoryRepository $blogCategoryRepository,
            DocumentRepository $documentRepository
        ) {
        $this->users = $userRepository->getNotBlocked();
        $this->admins = $adminRepository->all();
        $this->blogCategories = $blogCategoryRepository->getNotBlocked();
        // $this->documents = $documentRepository->all();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->users->each(fn(User $user) => $this->generateBogs($user));
        $this->admins->each(fn(Admin $admin) => $this->generateBogs($admin));
    }


    private function generateBogs(Model $model): void
    {
        $this->documents = collect();
        for ($i=21; $i <= 40; $i++) { 
            $document = Document::factory([
                'path' => '/images/blog/bs1.jpg',         // images/blog/bs1.jpg
                'name' => Str::random(10) . '-bs1.jpg',
                'user_file_name' => 'bs1.jpg',
            ])->create();

            $this->documents->add($document);
        }

        // dd($documents);

        $model->blogs()->saveMany(
            Blog::factory([
                'media_content_id' => $this->documents->random()->id,
                'category_id' => $this->blogCategories->random()->id,
            ])->count(random_int(1, 5))->create()
        );
    }
}
