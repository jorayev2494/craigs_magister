<?php

namespace App\Services;

use App\Repositories\Eloquent\CityRepository;
use App\Services\Base\Abstracts\BaseModelService;

final class CityService extends BaseModelService
{
    /**
    * @var CityRepository $cityRepository
    */
    public CityRepository $cityEloquentRepository;

    public function __construct(CityRepository $cityEloquentRepository) {
        $this->cityEloquentRepository = $cityEloquentRepository;
    }
}
