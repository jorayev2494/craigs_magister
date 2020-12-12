<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use Illuminate\Database\Eloquent\Collection;

class BlogRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return Blog::class;
    }

    public function getPublishedBlogs(): Collection
    {
        $pipeline = $this->getInstancePipeline()
                        ->send($this->getModelClone()->newQuery())
                        ->through([
                            \App\Pipelines\Database\Queries\BlogPublished::class,
                            \App\Pipelines\Database\QueryFilters\Sort::class,
                        ])
                        ->thenReturn()
                        ->get();
        return $pipeline;
    }

    public function findPublishedBlog(int $id): Blog
    {
        $pipeline = $this->getInstancePipeline()
                        ->send($this->getModelClone()->newQuery())
                        ->through(\App\Pipelines\Database\Queries\BlogPublished::class)
                        ->thenReturn()
                        ->findOrFail($id);
        return $pipeline;
    }
}
