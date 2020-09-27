<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\RegisterRequest;
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
        return response()->json($this->adminService->register($request->validated()));
    }

    /**
     * Admin login
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request) : JsonResponse
    {
        ['access_token' => $token, 'user_data' => $user_data] = $this->adminService->auth($request->email, $request->password);
        return response()->json(array('access_token' => $token, 'user_data' => $user_data));
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
        // dd($request->headers);
        return response()->json($this->adminService->tokenRefresh($request), Response::HTTP_OK);
    }
}
