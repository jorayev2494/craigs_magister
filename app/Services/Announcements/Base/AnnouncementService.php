<?php

namespace App\Services\Announcements\Base;

use App\Models\Announcements\Base\Announcement;
use App\Services\Base\Abstracts\BaseModelService;
use Illuminate\Database\Eloquent\Collection;

class AnnouncementService extends BaseModelService
{
    public function getModel(): string
    {
        return Announcement::class;
    }

    public function getAnnouncements() : Collection
    {
        $announcements = $this->getModelClone()->newQuery()->get();
        return $announcements;
    }
}
