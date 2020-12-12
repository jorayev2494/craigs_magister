<?php

namespace App\Repositories\Eloquent\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

/**
 * Eloquent Basic Methods Trait
 */
trait EloquentBasicMethodsTrait
{
    protected function getInstancePipeline(): Pipeline
    {
        return $this->app->make(Pipeline::class);
    }
    
    /**
     * Service All
     *
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all($columns = ['*'], $relations = null): Collection
    {
        $build = $this->getModelClone();

        if ($relations) $build->with($relations);

        return $build->get($columns);
    }

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

    public function getBlocked(): Collection
    {
        $pipeline = $this->getInstancePipeline()
                    ->send($this->getModelClone()->newQuery())
                    ->through(
                        \App\Pipelines\Database\Queries\Blocked::class,
                        \App\Pipelines\Database\QueryFilters\Sort::class
                    )
                    ->thenReturn()->get();

        return $pipeline;
    }

    public function getNotBlocked(): Collection
    {
        $pipeline = $this->getInstancePipeline()
                    ->send($this->getModelClone()->newQuery())
                    ->through(
                        \App\Pipelines\Database\Queries\NotBlocked::class,
                        \App\Pipelines\Database\QueryFilters\Sort::class
                    )
                    ->thenReturn()->get();

        return $pipeline;
    }

    public function getBySortedQuery(): Collection
    {
        $pipeline = $this->getInstancePipeline()
                    ->send($this->getModelClone()->newQuery())
                    ->through(
                        \App\Pipelines\Database\QueryFilters\Sort::class
                    )
                    ->thenReturn()
                    ->get();

        return $pipeline;
    }
}
