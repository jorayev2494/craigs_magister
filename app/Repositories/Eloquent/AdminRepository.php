<?php

namespace App\Repositories\Eloquent;

use App\Models\Admin;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class AdminRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return Admin::class;
    }
}
