<?php

namespace App\Repositories\Eloquent;

use App\Models\AnnouncementReview;
use App\Models\Announcements\Base\Announcement;
use App\Models\User;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use Illuminate\Database\Eloquent\Collection;

class AnnouncementReviewRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return AnnouncementReview::class;
    }

    public function getReviewsByAuthor(User $author): Collection
    {
        $approvedAnnouncements = $author->announcements()->where('status', Announcement::STATUS_APPROVED)->get();
        $announcementReviews = $this->getModelClone()->newQuery()
                                                    ->whereIn('announcement_id', $approvedAnnouncements->pluck('id'))
                                                    ->orderBy('created_at', 'DESC')
                                                    ->with('creator', 'announcement')
                                                    ->get();
        return $announcementReviews;
    }
}
