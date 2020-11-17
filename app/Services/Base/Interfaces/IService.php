<?php

declare(strict_types = 1);

namespace App\Services\Base\Interfaces;

use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface Service
 */
interface IService 
{
    public function instanceCallerEloquentRepository(): BaseEloquentModelRepository;

}