<?php

namespace App\Repositories\Eloquent;

use App\Models\Country;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

final class CountryRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return Country::class;
    }
}
