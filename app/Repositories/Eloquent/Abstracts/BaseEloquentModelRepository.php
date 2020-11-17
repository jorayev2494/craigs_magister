<?php

namespace App\Repositories\Eloquent\Abstracts;

use App\Exceptions\ServiceException;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Eloquent\Traits\EloquentBasicMethodsTrait;
use App\Repositories\Eloquent\Traits\EloquentCRUDTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Pipeline\Pipeline;

abstract class BaseEloquentModelRepository implements BaseRepositoryInterface
{
    use EloquentCRUDTrait;
    use EloquentBasicMethodsTrait;

    /**
     * @var Application $app
     */
    protected Application $app;

    /**
     * @var Model $model
     */
    public Model $model;

    /**
     * @return string
     */
    abstract public function getModel(): string;

    public function __construct(Application $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return Model|mixed|string
     */
    public function makeModel(): Model
    {
        $model = $this->app->make($this->getModel());
        
        if (!$model instanceof Model) {
            throw new ServiceException("Class {$this->getModel()} must be an instance of " . Model::class);
        }

        return $this->model = $model;
    }

    /**
     * Get Model Clone
     *
     * @return Model
     */
    public function getModelClone(): Model
    {
        if (!$this->model instanceof Model) {
            throw new ServiceException("Repository not instanced {$this->model}");
        }

        return clone $this->model;
    }
}