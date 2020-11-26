<?php

namespace App\Services;

use App\Repositories\Eloquent\CategoryRepository;
use App\Services\Base\Abstracts\BaseModelService;

class CategoryService extends BaseModelService
{
    /**
    * @var CategoryRepository $categoryRepository
    */
    public CategoryRepository $categoryEloquentRepository;

    public function __construct(CategoryRepository $categoryEloquentRepository) {
        $this->categoryEloquentRepository = $categoryEloquentRepository;
    }
}
