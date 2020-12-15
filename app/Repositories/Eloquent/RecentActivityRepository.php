<?php

namespace App\Repositories\Eloquent;

use App\Models\RecentActivity;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use Illuminate\Database\Eloquent\Model;

class RecentActivityRepository extends BaseEloquentModelRepository
{

    public function getModel(): string
    {
        return RecentActivity::class;
    }

    public function updateOrCreate(array $attributes, array $values = []): Model
    {
        return $this->getModelClone()->newQuery()->updateOrCreate($attributes, $values);
    }
    
}
