<?php

namespace App\Pipelines\Database\QueryFilters;

use App\Pipelines\Database\QueryFilters\Abstracts\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class Sort extends FilterAbstract {

    protected function applyFilter(Builder $qb): void
    {
        $qb->when($this->request->has($this->filterName()), function(Builder $qb): void {
            $qb->orderBy(
                $this->request->query($this->filterName(), 'id'),
                $this->request->query('sort_rule', 'ASC')
            );
        });
    }
}