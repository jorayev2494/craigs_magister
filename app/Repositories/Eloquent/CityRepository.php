<?php

namespace App\Repositories\Eloquent;

use App\Models\City;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class CityRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return City::class;
    }
}
