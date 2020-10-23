<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\Admin\Management\UserManagementService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
    * @var UserManagementService $userManagementService
    */
    private UserManagementService $userManagementService;

    public function __construct(UserManagementService $userManagementService) {
        $this->userManagementService = $userManagementService;
        $this->middleware('auth:' . IBaseAppGuards::ADMIN);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $users = $this->userManagementService->all(['*'], []);
        return response()->json(UserResource::collection($users));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $user = $this->userManagementService->find($id);
        return response()->json(UserResource::make($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $user = $this->userManagementService->update($id, $request->all());
        return response()->json(UserResource::make($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->userManagementService->deleteProfile($id);
        return response()->noContent(Response::HTTP_NO_CONTENT);
    }
}
