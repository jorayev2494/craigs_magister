<?php

declare(strict_types = 1);

namespace App\Services\Base\Abstracts;

use App\Exceptions\BadRequestException;
use App\Exceptions\ServiceException;
use App\Models\Interfaces\IBaseUserModel;
use App\Models\User;
use App\Pipelines\QueryFilters\UnblockDate;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use App\Repositories\Eloquent\Interfaces\IEloquentRepositoryFactory;
use App\Services\Base\Interfaces\IService;
use App\Traits\Pagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;

abstract class BaseModelService implements IService 
{
    use Pagination;

    /**
    * @var BaseEloquentModelRepository|Model|null $serviceEloquentModelRepository
    */
    protected BaseEloquentModelRepository $baseEloquentModelRepository;

    public function instanceCallerEloquentRepository(): BaseEloquentModelRepository
    {
        // dd(class_basename($this), str_replace(['ManagementService'], 'Repository', class_basename($this)));
        // return $this->baseEloquentModelRepository = $eloquentModelRepository ?: app()->make(
        //     '\App\Repositories\Eloquent\\' . str_replace(['ManagementService', 'Service'], 'Repository', class_basename($this))
        // );

        $eloquentRepositoryFactory = app()->make(IEloquentRepositoryFactory::class);
        return $this->baseEloquentModelRepository = $eloquentRepositoryFactory->make($this);
    }

    protected function getInstancePipeline(): Pipeline
    {
        return app()->make(Pipeline::class);
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {

        // if (!Str::contains($method, ['Repository', 'Delegate', 'Service'])) {
        //     if (!method_exists($this, $method))
        //         throw new BadRequestException("In the service not found this {$method}([...parameters]) method");
        // }

        $this->instanceCallerEloquentRepository();
        $method = str_replace(['Repository', 'Delegate'], '',  $method);

        if (!is_null($method) && is_array($parameters)) {
            return $this->baseEloquentModelRepository->$method(...$parameters);
        }
        
        if (!is_null($method) && !is_null($parameters)) {
            return $this->baseEloquentModelRepository->$method($parameters);
        }
        
        return $this->baseEloquentModelRepository->$method();
    }
}