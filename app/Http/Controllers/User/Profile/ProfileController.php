<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\ProfileUpdateRequest;
use App\Http\Requests\User\Profile\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class ProfileController extends Controller
{

    /**
    * @var UserService $userService
    */
    private UserService $userService;

    /**
    * @var User $authUser
    */
    private ?User $authUser;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
        $this->middleware('auth:' . IBaseAppGuards::USER);
        $this->authUser = Auth::guard(IBaseAppGuards::USER)->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(): JsonResponse
    // {
    //     return response()->json(UserResource::make($this->authUser));
    // }

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
        return response()->json(UserResource::make($this->authUser));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, int $id): JsonResponse
    {
        dd($request->validated());
        $updatedUser = $this->userService->updateProfile($id, $request->validated());
        return response()->json($updatedUser);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->userService->deleteProfile($id);
        return response()->noContent();
    }
}
