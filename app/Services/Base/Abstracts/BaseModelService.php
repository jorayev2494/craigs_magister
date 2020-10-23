<?php

declare(strict_types = 1);

namespace App\Services\Base\Abstracts;

use App\Exceptions\ServiceException;
use App\Models\Interfaces\IBaseUserModel;
use App\Services\Base\Interfaces\IService;
use App\Traits\Pagination;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseModelService implements IService 
{
    use Pagination;

    /**
     * @var Application $app
     */
    protected Application $app;
    

    /**
     * @var Model $model
     */
    protected Model $model;

    /**
     * @return string
     */
    abstract public function getModel() : string;
    
    public function __construct(Application $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return Model|mixed|string
     */
    public function makeModel() : Model
    {
        $model = $this->app->make($this->getModel());
        
        if (!$model instanceof Model) {
            throw new ServiceException("Class {$this->getModel()} must be an instance of " . Model::class);
        }

        return $this->model = $model;
    }

    /**
     * Service All
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all($columns = ['*'], $relations = ['*']): Collection
    {
        return $this->getModelClone()->with($relations)->get($columns);
    }

    #region Real Service Base methods
    /**
     * Get Model Clone
     *
     * @return Model
     */
    public function getModelClone() : Model
    {
        return clone $this->model;
    }

    /**
     * Service Create
     * @param array $data
     * @return mixed
     */
    public function create(array $data) : Model
    {
        return $this->getModelClone()->newQuery()->create($data);
    }

    /**
     * Service Update
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data) : bool
    {
        if (array_key_exists('id', $data)) 
            unset($data['id']);

        return $this->getModelClone()->newQuery()->findOrFail($id)->update($data);
    }

    /**
     * Service Delete
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id) : bool
    {
        $model = $this->getModelClone()->newQuery()->find($id);
        return $model->delete();
    }
    #endregion

    /**
     * Service find
     *
     * @param integer $id
     * @param array $columns
     * @return Model|null
     */
    public function find(int $id, array $columns = ['*']): ?Model
    {
        return $this->getModelClone()->newQuery()->findOrFail($id, $columns);
    }

    /**
     * Service FindBy
     *
     * @param string $field
     * @param string $value
     * @param string ...$params
     * @return Collection
     */
    public function findBy(string $field, string $value, string ...$params): Collection
    {
        return $this->getModelClone()->newQuery()->where($field, $value)->get(...$params);
    }

    /**
     * Service Paginate
     *
     * @param integer $perPage
     * @param array $columns
     * @param string ...$relations
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15, array $columns = ['*'], string ...$relations): LengthAwarePaginator
    {
        return $this->getModelClone()->with(...$relations)->paginate($perPage, $columns);
    }

    // /**
    //  * Handle dynamic method calls into the model.
    //  *
    //  * @param  string  $method
    //  * @param  array  $parameters
    //  * @return mixed
    //  */
    // public function __call(string $method, $parameters)
    // {
    //     if (is_string($method) && count($parameters)) {
    //         return $this->getModelClone()->$method($parameters[0]);
    //     } else if (is_string($method) && !is_array($parameters)) {
    //         return $this->getModelClone()->$method($parameters);
    //     } else {
    //         return $this->getModelClone()->$method();
    //     }

    //     return $this->getModelClone()->$method();
    // }
}