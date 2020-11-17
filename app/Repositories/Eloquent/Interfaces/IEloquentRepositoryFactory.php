<?php

namespace App\Repositories\Eloquent\Interfaces;

use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use App\Services\Base\Abstracts\BaseModelService;

interface IEloquentRepositoryFactory {
    public function make(BaseModelService $callerService): BaseEloquentModelRepository;
}