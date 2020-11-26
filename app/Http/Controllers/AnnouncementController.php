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
    /**
    * @var AnnouncementService $announcementService
    */
    private ?AnnouncementService $announcementService;

    public function __construct(AnnouncementService $announcementService) {
        $this->announcementService = $announcementService;
    }

    public function index(): JsonResponse
    {
        $announcements = $this->announcementService->getByRequestQuerySort();
        return response()->json(
            AnnouncementResource::collection($announcements)
        );
    }
}
