<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecentActivityResource;
use App\Models\Admin;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\RecentActivityService;
use App\Traits\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecentActivityController extends Controller
{
    use Pagination;
    
    /**
    * @var Admin $authAdmin
    */
    private ?Admin $authAdmin;

    /**
    * @var RecentActivityService $recentActivityService
    */
    private RecentActivityService $recentActivityService;

    public function __construct(RecentActivityService $recentActivityService) {
        $this->middleware('auth:' . IBaseAppGuards::ADMIN);
        $this->authAdmin = Auth::guard(IBaseAppGuards::ADMIN)->user();
        $this->recentActivityService = $recentActivityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $this->resolvePaginate($request);
        $recentActivities = $this->recentActivityService->recentActivityEloquentRepository->all();
        $recentActivitiesPaginate = $this->getDataForResponse(
            RecentActivityResource::collection($recentActivities->sortByDesc('id'))
        );
        return response()->json($recentActivitiesPaginate);
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
        $foundRecentActivity = $this->recentActivityService->recentActivityEloquentRepository->find($id);
        return response()->json(RecentActivityResource::make($foundRecentActivity));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
