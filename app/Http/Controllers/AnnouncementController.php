<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Announcements\AnnouncementResource;
use App\Models\Announcements\Base\Announcement;
use App\Models\User;
use App\Services\Announcements\Base\AnnouncementService;
use App\Traits\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    use Pagination;

    /**
    * @var AnnouncementService $announcementService
    */
    private ?AnnouncementService $announcementService;

    public function __construct(AnnouncementService $announcementService) {
        $this->announcementService = $announcementService;
    }

    public function index(Request $request): JsonResponse
    {
        $this->resolvePaginate($request);
        $announcements = $this->announcementService->getApproved();
        $announcementsPaginate = $this->getDataForResponse(AnnouncementResource::collection(
            $announcements->sortByDesc('created_at')->load('category', 'reviews', 'creator')
        ));
        // dd($announcementsPaginate);
        return response()->json($announcementsPaginate);
    }

    public function show(int $id): JsonResponse
    {
        /**
         * @var Announcement $foundAnnouncement
         */
        $foundAnnouncement = $this->announcementService->announcementEloquentRepository->find($id);
        $foundAnnouncement->increment('viewed');
        return response()->json(AnnouncementResource::make($foundAnnouncement->loadMissing('creator', 'reviews.creator')));
    }
}
