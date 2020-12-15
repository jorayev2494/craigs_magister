<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecentActivityResource;
use App\Models\User;
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
    * @var User $authUser
    */
    private ?User $authUser;

    /**
    * @var RecentActivityService $recentActivityService
    */
    private RecentActivityService $recentActivityService;

    public function __construct(RecentActivityService $recentActivityService) {
        $this->middleware('auth:'. IBaseAppGuards::USER);
        $this->authUser = Auth::guard(IBaseAppGuards::USER)->user();
        $this->recentActivityService = $recentActivityService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $this->resolvePaginate($request);
        $recentActivities = $this->authUser->recentActivities->sortByDesc('id');
        $recentActivitiesPaginate = $this->getDataForResponse(RecentActivityResource::collection($recentActivities));
        return response()->json($recentActivitiesPaginate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $foundRecentActivity = $this->authUser->recentActivities()->findOrFail($id);
        return response()->json(RecentActivityResource::make($foundRecentActivity));
    }
}
