<?php

namespace App\Services\Announcements\Base;

use App\Models\Announcements\Base\Announcement;
use App\Repositories\Eloquent\AnnouncementRepository;
use App\Services\Base\Abstracts\BaseModelService;
use Illuminate\Database\Eloquent\Collection;

class AnnouncementService extends BaseModelService
{

    /**
    * @var AnnouncementRepository $announcementRepository
    */
    public AnnouncementRepository $announcementRepository;

    public function __construct(AnnouncementRepository $announcementRepository) {
        $this->announcementRepository = $announcementRepository;
    }
}
