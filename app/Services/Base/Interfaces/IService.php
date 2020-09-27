<?php

declare(strict_types = 1);

namespace App\Services\Base\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface Service
 */
interface IService 
{
    /**
     * Get All
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all($columns = ['*'], $relations = ['*']) : Collection;

    #region Base Model methods
    /**
     * Base Model method Create
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data) : Model;

    /**
     * Base Model method Update
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data) : bool;


    /**
     * Base Model method Delete
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id) : bool;
    #endregion

    /**
     * Find
     *
     * @param integer $id
     * @param array|null $columns
     * @return Model|null
     */
    public function find(int $id, array $columns = ['*']) : ?Model;

    /**
     * Find By 
     *
     * @param string $field
     * @param string $value
     * @param string ...$params
     * @return Collection
     */
    public function findBy(string $field, string $value, string ...$params) : Collection;


    /**
     * Pagination
     *
     * @param integer $perPAge
     * @param array $columns
     * @param string ...$relations
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPAge = 15, array $columns = ['*'], string ...$relations) : LengthAwarePaginator;

}