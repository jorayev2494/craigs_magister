<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\VarDumper\Cloner\VarCloner;

final class AuthController extends Controller
{

    /**
    * @var UserService $userService
    */
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware(['auth:user'])->except('register', 'login');
    }

    /**
     * User Register
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request) : JsonResponse
    {
        return response()->json($this->userService->register($request->validated()), Response::HTTP_CREATED);
    }

    /**
     * User login
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request) : JsonResponse
    {
        ['access_token' => $token, 'user_data' => $userData] = $this->userService->auth($request->email, $request->password);
        return response()->json(['access_token' => $token, 'user_data' => $userData]);
    }

    /**
     * User logout
     *
     * @return Response
     */
    public function logout() : Response
    {
        $this->userService->logout();
        return response()->noContent();
    }

    /**
     * User refreshToken
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function refreshToken(Request $request) : JsonResponse
    {
        return response()->json($this->userService->tokenRefresh($request));
    }
}
