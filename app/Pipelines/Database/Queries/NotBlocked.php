<?php

namespace App\Pipelines\Database\Queries;

use App\Exceptions\BadRequestException;
use Closure;
use Illuminate\Database\Eloquent\Builder;

class NotBlocked
{
    public function handle(Builder $qb, Closure $next): Builder
    {
        $colName = 'unblock_date';

        if (!$qb->getModel()->isFillable($colName)) {
            throw new BadRequestException("Property {$colName} not exists or not fillable");
        }

        $qb->whereNull($colName);

        return $next($qb);
    }
}
