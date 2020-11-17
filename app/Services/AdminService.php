<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\Eloquent\AdminRepository;
use App\Services\Base\Abstracts\AuthorizeService;
use App\Services\Base\Interfaces\IBaseAppGuards;

final class AdminService extends AuthorizeService
{
    /**
    * @var AdminRepository $adminRepository
    */
    public AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository) {
        $this->adminRepository = $this->instanceCallerEloquentRepository($adminRepository);
    }

    public function getGuard(): string
    {
        return IBaseAppGuards::ADMIN;
    }
}
