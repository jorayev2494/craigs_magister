<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\Abstracts\BaseEloquentAbstract;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return User::class;
    }

    // public function find(int $id, array $columns = ['*']): ?Model
    // {
    //     dd($id);
    // }
}
