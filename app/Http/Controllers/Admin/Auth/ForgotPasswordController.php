<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Exceptions\Interfaces\IErrorMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\ResetPasswordRequest;
use App\Http\Requests\Admin\Auth\SendResetTokenRequest;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{

    /**
    * @var AdminService $adminService
    */
    private AdminService $adminService;

    public function __construct(AdminService $adminService) {
        $this->adminService = $adminService;
    }

    public function sendResetTokenEmail(Request $request) : Response
    {
        $validator = Validator::make($request->all(), 
                                    ['email'        => 'required|email|exists:admins,email'],
                                    ['email.exists' => IErrorMessages::EMAIL_NOT_EXIST]
                                );

        if ($validator->fails()) {
            return response($this->errorResponse($validator->errors()->toArray()), Response::HTTP_BAD_REQUEST);
        }

        $response = $this->adminService->sendResetToken($request->input('email', ''));
        return is_array($response) ? response($response, Response::HTTP_ACCEPTED) : response()->noContent(Response::HTTP_ACCEPTED);
    }

    public function resetPassword(ResetPasswordRequest $request) : Response
    {
        $this->adminService->resetPassword($request->input('token', ''), $request->input('password', ''));
        return response()->noContent();
    }

}
