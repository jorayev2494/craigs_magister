<?php

namespace App\Http\Controllers\Admin\Management\Announcement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Management\Announcements\AnnouncementManagementChangeStatusRequest;
use App\Models\Admin;
use App\Models\User;
use App\Services\Admin\Management\AnnouncementManagementService;
use App\Services\Announcements\Base\AnnouncementService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AnnouncementChangeStatusController extends Controller
{

    /**
    * @var Admin $authAdmin
    */
    private ?Admin $authAdmin;

    /**
    * @var AnnouncementManagementService $announcementManagementService
    */
    private ?AnnouncementManagementService $announcementManagementService;

    public function __construct(AnnouncementManagementService $announcementManagementService) {
        $this->middleware(['auth:' . IBaseAppGuards::ADMIN]);
        $this->authAdmin = Auth::guard(IBaseAppGuards::ADMIN)->user();
        $this->announcementManagementService = $announcementManagementService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AnnouncementManagementChangeStatusRequest $request, int $id): Response
    {
        // dd($request->validated());
        $this->announcementManagementService->changeStatus($id, $request->validated());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }
}
