<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use App\Services\Base\Abstracts\AuthorizeService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use FileService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UserService extends AuthorizeService
{
    /**
    * @var UserRepository $userEloquentRepository
    */
    public UserRepository $userEloquentRepository;

    public function __construct(UserRepository $userEloquentRepository) {
        $this->userEloquentRepository = $this->instanceCallerEloquentRepository($userEloquentRepository);
    }

    public function getGuard(): string
    {
        return IBaseAppGuards::USER;
    }

    public function deleteProfile(int $id): void
    {
        $foundUser = $this->find($id);
        FileService::deleteFile($foundUser->getAvatarPath(), $foundUser->avatar);
        $foundUser->delete();
    }
}
