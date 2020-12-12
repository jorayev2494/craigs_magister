<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Services\BlogService;
use App\Traits\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use Pagination;

    /**
    * @var BlogService $blogService
    */
    private BlogService $blogService;

    public function __construct(BlogService $blogService) {
        $this->blogService = $blogService;
    }

    public function index(Request $request): JsonResponse
    {
        // $this->resolvePaginate($request);
        $blogs = $this->blogService->getPublishedBlogs();
        $blogsPaginate = BlogResource::collection($blogs);        //$this->getDataForResponse(BlogResource::collection($blogs));
        return response()->json($blogsPaginate);
    }

    public function show(int $id): JsonResponse
    {
        $foundBlock = $this->blogService->findPublishedBlog($id);
        return response()->json(BlogResource::make($foundBlock));
    }
}
