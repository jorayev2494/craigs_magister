<?php

namespace App\Repositories\Eloquent;

use App\Models\BlogCategory;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class BlogCategoryRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return BlogCategory::class;
    }
}
