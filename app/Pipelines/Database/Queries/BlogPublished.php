<?php

namespace App\Pipelines\Database\Queries;

use App\Models\Blog;
use Closure;
use Illuminate\Database\Eloquent\Builder;

class BlogPublished
{
    public function handle(Builder $qb, Closure $next): Builder
    {
        $qb->where('status', Blog::STATUS_PUBLISHED);
        return $next($qb);
    }
}
