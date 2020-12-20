<?php

namespace App\Http\Controllers;

use App\Exceptions\BadRequestException;
use App\Http\Requests\CreatorMessageSendRequest;
use App\Mail\Announcement\CreatorSendMessageMail;
use App\Services\Announcements\Base\AnnouncementService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class CreatorMessageController extends Controller
{
    public function send(CreatorMessageSendRequest $request, int $id): Response
    {
        $data = $request->validated();
        
        // Only for Announcement
        if ($request->query('type') == 'announcement') {
            $foundAnnouncement = resolve(AnnouncementService::class)->announcementEloquentRepository->find($id);

            if ($foundAnnouncement->creator_id == $data['creator_id']) {
                Mail::to($foundAnnouncement->creator->email)->queue(new CreatorSendMessageMail($data, $foundAnnouncement));        
            } else {
                throw new BadRequestException("Announcement not fond in th creator");
            }
        }

        return response()->noContent(Response::HTTP_ACCEPTED);
    }
}
