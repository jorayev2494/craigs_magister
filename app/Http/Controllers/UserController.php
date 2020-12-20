<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Announcements\Base\Announcement;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
    * @var UserService $userService
    */
    private UserService $userService;


    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, int $id): JsonResponse
    {
        /**
         * @var User $foundUser
         */
        $foundUser = $this->userService->userEloquentRepository->find($id);
        $foundUser->setAttribute(
                'announcements', 
                $foundUser->announcements()
                ->where('status', Announcement::STATUS_APPROVED)
                ->orderBy('created_at', 'DESC')
                ->get()
            );
        return response()->json(UserResource::make($foundUser->loadMissing('announcements.creator', 'announcements.reviews', 'announcements.category', 'reviews.creator')));
    }
}
