<?php

namespace App\Repositories\Eloquent;

use App\Models\AnnouncementReview;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class AnnouncementReviewRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return AnnouncementReview::class;
    }
}
