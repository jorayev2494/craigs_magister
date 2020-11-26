<?php

namespace App\Pipelines\Database\QueryFilters\Abstracts;

use Closure;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class FilterAbstract
{
    /**
    * @var Request $request
    */
    protected ?Request $request;

    /**
    * @var string $field
    */
    protected ?string $field;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    abstract protected function applyFilter(Builder $query): void;

    public function handle(Builder $qb, Closure $next): Builder
    {
        $this->field = $this->request->query($this->filterName(), 'id');

        if ($this->field == 'id' || $qb->getModel()->isFillable($this->field)) {
            $this->request->whenFilled($this->filterName(), fn() => $this->applyFilter($qb));
        } else {
            throw new Exception("Field {$this->field} not fount");
        }
        return $next($qb);
    }

    protected function filterName(): string
    {
        return Str::snake(class_basename($this));
    }
}
