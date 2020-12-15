<?php

namespace App\Services\User;

use App\Models\User;
use App\Models\UserReview;
use App\Repositories\Eloquent\UserReviewRepository;
use App\Services\Base\Abstracts\BaseModelService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserReviewService extends BaseModelService
{

    /**
    * @var User $authUser
    */
    private ?User $authUser;

    /**
    * @var UserReviewRepository $userReviewEloquentRepository
    */
    public UserReviewRepository $userReviewEloquentRepository;

    public function __construct(UserReviewRepository $userReviewEloquentRepository) {
        $this->authUser = Auth::guard(IBaseAppGuards::USER)->user();
        $this->userReviewEloquentRepository = $userReviewEloquentRepository;
    }

    public function storeReview(int $id, array $data): UserReview
    {
        /**
         * @var User $foundUser
         */
        $foundUser = resolve(UserService::class)->find($id);
        return $foundUser->reviews()->create(array_merge($data, ['creator_id' => $this->authUser->id]));
    }
}
