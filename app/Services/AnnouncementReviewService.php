<?php

namespace App\Services;

use App\Models\AnnouncementReview;
use App\Models\Announcements\Base\Announcement;
use App\Models\User;
use App\Repositories\Eloquent\AnnouncementReviewRepository;
use App\Services\Announcements\Base\AnnouncementService;
use App\Services\Base\Abstracts\BaseModelService;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Support\Facades\Auth;

class AnnouncementReviewService extends BaseModelService
{

    /**
    * @var User $authUser
    */
    private ?User $authUser;

    /**
    * @var AnnouncementReviewRepository $announcementReviewEloquentRepository
    */
    private AnnouncementReviewRepository $announcementReviewEloquentRepository;

    public function __construct(AnnouncementReviewRepository $announcementReviewEloquentRepository) {
        $this->authUser = Auth::guard(IBaseAppGuards::USER)->user();
        $this->announcementReviewEloquentRepository = $announcementReviewEloquentRepository;
    }

    public function storeReview(int $id, array $data): AnnouncementReview
    {
        /**
         * @var Announcement $announcement
         */
        $announcement = resolve(AnnouncementService::class)->find($id);
        return $announcement->reviews()->create(array_merge($data, ['creator_id' => $this->authUser->id]));
    }
}
