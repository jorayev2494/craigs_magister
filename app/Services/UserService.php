<?php

namespace App\Services;

use App\Models\User;
use App\Services\Base\Abstracts\AuthorizeService;
use App\Services\Base\Interfaces\IBaseAppGuards;

class UserService extends AuthorizeService
{
    public function getModel(): string
    {
        return User::class;
    }

    public function getGuard(): string
    {
        return IBaseAppGuards::USER;
    }
}
