<?php

namespace App\Observers\Announcement;

use App\Models\Admin;
use App\Models\Announcements\Base\Announcement;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\RecentActivityService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AnnouncementObserver
{

    /**
    * @var Admin $authAdmin
    */
    private ?Admin $authAdmin;

    /**
    * @var RecentActivityService $recentActivityService
    */
    private RecentActivityService $recentActivityService;

    public function __construct(RecentActivityService $recentActivityService) {
        $this->authAdmin = Auth::guard(IBaseAppGuards::ADMIN)->user();
        $this->recentActivityService = $recentActivityService;
    }

    /**
     * Handle the announcement "created" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function created(Announcement $announcement): void
    {
        // dd(__METHOD__);
    }

    /**
     * Handle the announcement "updated" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function updated(Announcement $announcement): void
    {
        // Only for Admin Actions
        if ($this->authAdmin && $announcement->wasChanged()) {
            $this->recentActivityService->updateOrCreate(
                [
                    'user_id' => $announcement->creator->id,
                    'announcement_id' => $announcement->id,
                    'admin_id' => $this->authAdmin->id,
                    'action' => __FUNCTION__,
                ],
                $announcement->getChanges()
            );
        }
    }

    /**
     * Handle the announcement "deleted" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function deleted(Announcement $announcement): void
    {
        // Only for Admin Actions
        if ($this->authAdmin && $announcement->wasChanged()) {
            $this->recentActivityService->updateOrCreate(
                [
                    'user_id' => $announcement->creator->id,
                    'announcement_id' => $announcement->id,
                    'admin_id' => $this->authAdmin->id,
                    'action' => __FUNCTION__,
                ],
                $announcement->getChanges()
            );
        }
    }

    /**
     * Handle the announcement "restored" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function restored(Announcement $announcement): void
    {
        // dd(__METHOD__);
    }

    /**
     * Handle the announcement "force deleted" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function forceDeleted(Announcement $announcement): void
    {
        // dd(__METHOD__);
    }
}
