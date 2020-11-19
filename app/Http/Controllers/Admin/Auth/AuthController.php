<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Resources\Admin\AdminResource;
use App\Services\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class AuthController extends Controller
{

    /**
     * @var AdminService
     */
    private AdminService $adminService;

    public function __construct(AdminService $adminService) {
        $this->adminService = $adminService;
        $this->middleware(['auth:admin'])->except('register', 'login');
    }

    /**
     * Admin register
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request) : JsonResponse
    {
        return response()->json(
            $this->adminService->register($request->validated()),
            Response::HTTP_CREATED
        );
    }

    /**
     * Admin login
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request) : JsonResponse
    {
        ['access_token' => $token, 'user_data' => $userData] = $this->adminService->auth($request->email, $request->password, 'email', $request->input('remember', false));
        return response()->json(
            array(
                'access_token' => $token, 
                'user_data' => AdminResource::make($userData)
            )
        );
    }

    /**
     * Admin logout
     *
     * @return Response
     */
    public function logout() : Response
    {
        $this->adminService->logout();
        return response()->noContent();
    }

    /**
     * Admin refreshToken
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function refreshToken(Request $request) : JsonResponse
    {
        return response()->json($this->adminService->tokenRefresh($request));
    }
}
