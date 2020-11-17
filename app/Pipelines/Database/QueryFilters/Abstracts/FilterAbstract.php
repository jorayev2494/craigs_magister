<?php

namespace App\Pipelines\Database\QueryFilters\Abstracts;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class FilterAbstract
{
    /**
    * @var Request $request
    */
    protected ?Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    abstract protected function applyFilter(Builder $query): void;

    public function handle(Builder $qb, Closure $next): Builder
    {
        $this->request->whenFilled($this->filterName(), fn() => $this->applyFilter($qb));
        return $next($qb);
    }

    protected function filterName(): string
    {
        return Str::snake(class_basename($this));
    }
}
