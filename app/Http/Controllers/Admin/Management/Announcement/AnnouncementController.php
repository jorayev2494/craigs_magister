<?php

namespace App\Http\Controllers\Admin\Management\Announcement;

use App\Http\Controllers\Controller;
use App\Services\Announcements\Base\AnnouncementService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnnouncementController extends Controller
{

    /**
    * @var AnnouncementService $announcementService
    */
    private AnnouncementService $announcementService;

    public function __construct(AnnouncementService $announcementService) {
        $this->announcementService = $announcementService;
        $this->middleware(['auth:' . IBaseAppGuards::ADMIN]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $announcements = $this->announcementService->announcementRepository->all();
        return response()->json($announcements);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
