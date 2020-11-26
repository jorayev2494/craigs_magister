<?php

namespace App\Repositories\Eloquent;

use App\Models\Announcements\Base\Category;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class CategoryRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return Category::class;
    }
}
