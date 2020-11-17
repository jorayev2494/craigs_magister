<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
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
}
