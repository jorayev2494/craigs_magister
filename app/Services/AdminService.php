<?php

namespace App\Services;

use App\Models\Admin;
use App\Services\Base\Abstracts\AuthorizeService;
use App\Services\Base\Interfaces\IBaseAppGuards;

final class AdminService extends AuthorizeService
{

    public function getModel(): string
    {
        return Admin::class;
    }

    public function getGuard(): string
    {
        return IBaseAppGuards::ADMIN;
    }
    
}
