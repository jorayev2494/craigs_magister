<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogStoreRequest;
use App\Http\Requests\Admin\Blog\BlogUpdateRequest;
use App\Http\Resources\BlogResource;
use App\Models\Admin;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
    * @var Admin $authAdmin
    */
    private ?Admin $authAdmin;

    /**
    * @var BlogService $blogService
    */
    private BlogService $blogService;

    public function __construct(BlogService $blogService) {
        $this->middleware('auth:' . IBaseAppGuards::ADMIN);
        $this->authAdmin = Auth::guard(IBaseAppGuards::ADMIN)->user();
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $blogs = $this->authAdmin->blogs;
        return response()->json(BlogResource::collection($blogs));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request): Response
    {
        $this->blogService->store($this->authAdmin, $request->validated());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $foundBlock = $this->authAdmin->blogs()->findOrFail($id);
        return response()->json(BlogResource::make($foundBlock));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, $id): Response
    {
        $this->blogService->update($this->authAdmin, $id, $request->validated());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): response
    {
        $this->blogService->delete($this->authAdmin, $id);
        return response()->noContent();
    }
}
