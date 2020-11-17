<?php

namespace App\Services;

use App\Repositories\Eloquent\CountryRepository;
use App\Services\Base\Abstracts\BaseModelService;

final class CountryService extends BaseModelService
{
    /**
    * @var CountryRepository $countryEloquentRepository
    */
    public CountryRepository $countryEloquentRepository;

    public function __construct(CountryRepository $countryEloquentRepository) {
        $this->countryEloquentRepository = $countryEloquentRepository;
    }
}
