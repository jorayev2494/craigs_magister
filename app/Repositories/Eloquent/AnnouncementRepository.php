<?php

namespace App\Repositories\Eloquent;

use App\Models\Announcements\Base\Announcement;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class AnnouncementRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return Announcement::class;
    }
}
