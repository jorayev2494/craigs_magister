<?php

namespace App\Http\Controllers\User\Announcements;

use App\Http\Controllers\Controller;
use App\Http\Requests\Announcements\AnnouncementStoreRequest;
use App\Http\Requests\Announcements\AnnouncementUpdateRequest;
use App\Http\Resources\Announcements\AnnouncementResource;
use App\Models\Announcements\Base\Announcement;
use App\Models\User;
use App\Services\Announcements\Base\AnnouncementService;
use App\Traits\Pagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnnouncementController extends Controller
{

    use Pagination;

    /**
    * @var User $authUser
    */
    private ?User $authUser;

    /**
    * @var AnnouncementService $announcementService
    */
    private AnnouncementService $announcementService;

    public function __construct(AnnouncementService $announcementService) {
        $this->middleware('auth:user');
        $this->authUser = auth()->guard('user')->user();
        $this->announcementService = $announcementService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Announcement::class);
        $this->resolvePaginate($request);
        $announcements = $this->authUser->announcements;
        $announcementsPaginate = $this->getDataForResponse(AnnouncementResource::collection($announcements->sortByDesc('created_at')));
        return response()->json($announcementsPaginate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementStoreRequest $request): Response
    {
        $this->authorize('create', Announcement::class);
        $this->announcementService->create($this->authUser, $request->validated());
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
        $foundAnnouncement = $this->announcementService->announcementEloquentRepository->find($id);
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
    public function update(AnnouncementUpdateRequest $request, int $id): Response
    {
        $this->authorize('update', $this->announcementService->announcementEloquentRepository->find($id));
        $this->announcementService->update($this->authUser, $id, $request->validated());
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
        $this->authorize('delete', $this->announcementService->announcementEloquentRepository->find($id));
        $this->announcementService->destroyByAuthorAnnouncement($this->authUser, $id);
        return response()->noContent();
    }
}
