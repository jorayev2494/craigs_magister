<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class EmailConfirmationController extends Controller
{

    /**
    * @var UserService $userService
    */
    public UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate(['token' => 'required|size:' . User::CONFIRM_TOKEN]);

        $this->userService->confirmEmail($request->get('token', null));
        return response()->noContent();
    }
}
