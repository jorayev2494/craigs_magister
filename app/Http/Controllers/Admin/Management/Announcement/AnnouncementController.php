<?php

namespace App\Http\Controllers\Admin\Management\Announcement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Management\Announcements\AnnouncementManagementUpdateRequest;
use App\Http\Resources\Announcements\AnnouncementResource;
use App\Services\Admin\Management\AnnouncementManagementService;
use App\Services\Announcements\Base\AnnouncementService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class AnnouncementController extends Controller
{

    /**
    * @var AnnouncementManagementService $announcementManagementService
    */
    private AnnouncementManagementService $announcementManagementService;

    public function __construct(AnnouncementManagementService $announcementManagementService) {
        $this->announcementManagementService = $announcementManagementService;
        $this->middleware(['auth:' . IBaseAppGuards::ADMIN]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $announcements = $this->announcementManagementService->announcementEloquentRepository->getBySortedQuery()->sortByDesc('created_at');
        // $this->authorize('viewAny');
        return response()->json(AnnouncementResource::collection($announcements));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $foundAnnouncement = $this->announcementManagementService->announcementEloquentRepository->find($id);
        $this->authorize('view', $foundAnnouncement);
        return response()->json(AnnouncementResource::make($foundAnnouncement));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementManagementUpdateRequest $request, int $id): Response
    {
        $foundAnnouncement = $this->announcementManagementService->announcementEloquentRepository->find($id);
        $this->authorize('update', $foundAnnouncement);
        $this->announcementManagementService->update(
            $foundAnnouncement->creator, 
            $foundAnnouncement->id, 
            $request->validated()
        );
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $foundAnnouncement = $this->announcementManagementService->announcementEloquentRepository->find($id);
        $this->authorize('delete', $foundAnnouncement);
        $this->announcementManagementService->destroyByAuthorAnnouncement(
            $foundAnnouncement->creator, 
            $foundAnnouncement->id
        );
        return response()->noContent();
    }
}
