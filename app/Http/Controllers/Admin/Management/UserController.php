<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Management\User\UpdateAvatarRequest;
use App\Http\Requests\Admin\Management\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\Admin\Management\UserManagementService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Http\JsonResponse;
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
        $users = $this->userManagementService->allRepository();
        return response()->json(UserResource::collection($users));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $user = $this->userManagementService->userEloquentRepository->find($id);
        return response()->json(UserResource::make($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, int $userId): JsonResponse
    {
        $user = $this->userManagementService->userEloquentRepository->update($userId, $request->validated());
        return response()->json(UserResource::make($user), Response::HTTP_ACCEPTED);        
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

    public function updateUserAvatar(UpdateAvatarRequest $request, int $id): Response
    {
        $this->userManagementService->updateUserAvatar($id, $request->file('uploaded_avatar'));
        return response()->noContent(Response::HTTP_ACCEPTED);
    }
}
