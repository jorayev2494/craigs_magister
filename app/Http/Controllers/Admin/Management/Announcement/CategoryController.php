<?php

namespace App\Http\Controllers\Admin\Management\Announcement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Management\Announcements\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Management\Announcements\Category\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\CategoryService;
use App\Traits\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    use Pagination;

    /**
    * @var CategoryService $categoryService
    */
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService = null) {
        $this->middleware('auth:' . IBaseAppGuards::ADMIN);
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $this->resolvePaginate($request);
        $announcementCategories = $this->categoryService->categoryEloquentRepository->all();
        $announcementCategoriesPaginate = CategoryResource::collection($announcementCategories);
        return response()->json($announcementCategoriesPaginate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request): Response
    {
        $this->categoryService->create($request->validated());
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
        $foundAnnouncementCategory = $this->categoryService->categoryEloquentRepository->find($id);
        return response()->json(CategoryResource::make($foundAnnouncementCategory));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, int $id): Response
    {
        $this->categoryService->update($id, $request->validated());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->categoryService->categoryEloquentRepository->delete($id);
        return response()->noContent();
    }
}