<?php

namespace App\Http\Controllers\User\Auth;

use App\Exceptions\Interfaces\IErrorMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\ResetPasswordRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /**
    * @var UserService $userService
    */
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function sendResetTokenEmail(Request $request) : Response
    {
        $validator = Validator::make($request->all(), 
                                    ['email'        => 'required|email|exists:users,email'],
                                    ['email.exists' => IErrorMessages::EMAIL_NOT_EXIST]
                                );

        if ($validator->fails()) {
            return response($this->errorResponse($validator->errors()->toArray()), Response::HTTP_BAD_REQUEST);
        }

        $response = $this->userService->sendResetToken($request->input('email', ''));
        return is_array($response) ? response($response, Response::HTTP_ACCEPTED) : response()->noContent(Response::HTTP_ACCEPTED);
    }

    public function resetPassword(ResetPasswordRequest $request) : Response
    {
        $this->userService->resetPassword($request->input('token', ''), $request->input('password', ''));
        return response()->noContent();
    }
}
