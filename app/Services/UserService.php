<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\User;
use App\Services\Base\Abstracts\AuthorizeService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use FileService;

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

    public function deleteProfile(int $id): void
    {
        $foundUser = $this->find($id);
        FileService::deleteFile($foundUser->avatar);
        $foundUser->delete();
    }
}
