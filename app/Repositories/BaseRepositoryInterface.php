<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * @return Model|mixed|string
     */
    public function makeModel(): Model;

    #region Base Model methods
    /**
     * Base Model method Create
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Base Model method Update
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data): Model;


    /**
     * Base Model method Delete
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool;
    #endregion
}
