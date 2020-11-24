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
    // use EloquentCRUDTrait;
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

    #region CRUD
    /**
     * Service Create
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Model
    {
        // return $this->getModelClone()->newQuery()->create($data);
        
        // $model = $this->getModelClone()->newInstance();
        // $model->fill($data)->save();
        // return $model;

        return tap(
            $this->getModelClone()->newInstance(), 
            fn(Model $instancedModel) => $instancedModel->fill($data)->save()
        );
    }

    /**
     * Service Update
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data): Model
    {
        if (array_key_exists('id', $data)) 
            unset($data['id']);

        // /**
        //  * @var Model $foundModel
        //  */
        // $foundModel = $this->getModelClone()->newQuery()->findOrFail($id);
        // // $foundModel->update($data);
        // $foundModel->fill($data)->save();
        // return $foundModel;

        return tap(
            $this->getModelClone()->newQuery()->findOrFail($id), 
            fn(Model $foundModel) => $foundModel->fill($data)->save()
        );
    }

    /**
     * Service Delete
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $model = $this->getModelClone()->newQuery()->findOrFail($id);
        return $model->delete();
    }
    #endregion
}