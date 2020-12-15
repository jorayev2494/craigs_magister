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

    public function create(array $data): void
    {
        $this->categoryEloquentRepository->create($this->dataFormatting($data));
    }

    public function update(int $id, array $data): void
    {
        $this->categoryEloquentRepository->update($id, $this->dataFormatting($data));
    }

    private function dataFormatting(array $data): array
    {
        return array_merge($data, [
                'slug' => strtolower($data['slug']),
                'model' => ucfirst(strtolower($data['model']))
            ]
        );
    }
}
