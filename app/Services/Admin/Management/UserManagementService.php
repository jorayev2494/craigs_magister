<?php


namespace App\Services\Admin\Management;

use App\Services\UserService;
use Illuminate\Http\UploadedFile;
use FileService;

class UserManagementService extends UserService
{
    public function updateUserAvatar(int $userId, UploadedFile $avatar): void
    {
        $foundUser = $this->userEloquentRepository->find($userId);
        $this->updateAvatar($foundUser, $avatar);
    }
}
