<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\Announcements\Base\Announcement;
use App\Models\Announcements\Base\Category;
use App\Services\CategoryService;
use App\Services\CityService;
use App\Services\CountryService;
use Illuminate\Http\JsonResponse;

class ServerPublicDataController extends Controller
{
    public function countries(CountryService $countryService): JsonResponse
    {
        $countries = $countryService->countryEloquentRepository->getNotBlocked();
        return response()->json(CountryResource::collection($countries));
    }

    public function cities(CityService $cityService): JsonResponse
    {
        $cities = $cityService->cityEloquentRepository->getNotBlocked();
        return response()->json(CityResource::collection($cities));
    }

    public function categories(CategoryService $categoryService): JsonResponse
    {
        /**
         * @var Category $categories
         */
        $categories = $categoryService->categoryEloquentRepository->getNotBlocked();
        $categories->each(
            fn(Category $category) => $category->setAttribute(
                'count_announcements', $category->announcements()->where('status', Announcement::STATUS_APPROVED)->count()
            )
        );

        return response()->json(CategoryResource::collection($categories));
    }

    public function pricePer(): JsonResponse
    {
        return response()->json(Announcement::PRICE_PERMISSIONS);
    }
}
