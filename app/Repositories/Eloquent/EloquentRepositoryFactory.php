<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use App\Repositories\Eloquent\Interfaces\IEloquentRepositoryFactory;
use App\Services\Base\Abstracts\BaseModelService;
use illuminate\Support\Str;

class EloquentRepositoryFactory implements IEloquentRepositoryFactory
{
    public function make(BaseModelService $callerService): BaseEloquentModelRepository
    {
        $repositoryName = str_replace(['ManagementService', 'Service'], 'Repository', class_basename($callerService));

        // if (Str::contains($repositoryName, 'Management')) {
        //     $repositoryName += 'Managementdddd';
        // }
        
        return app()->make('\App\Repositories\Eloquent\\' . $repositoryName);
    }
}
