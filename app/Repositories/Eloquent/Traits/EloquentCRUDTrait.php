<?php

namespace App\Repositories\Eloquent\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent CRUD Trait
 */
trait EloquentCRUDTrait
{
    /**
     * Service Create
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Model
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
    public function update(int $id, array $data): Model
    {
        if (array_key_exists('id', $data)) 
            unset($data['id']);

        /**
         * @var Model $foundModel
         */
        $foundModel = $this->getModelClone()->newQuery()->findOrFail($id);
        $foundModel->update($data);
        return $foundModel;
    }

    /**
     * Service Delete
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $model = $this->getModelClone()->newQuery()->find($id);
        return $model->delete();
    }
}
