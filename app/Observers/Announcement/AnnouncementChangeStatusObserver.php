<?php

namespace App\Observers\Announcement;

use App\Models\Announcements\Base\Announcement;

class AnnouncementChangeStatusObserver
{
    /**
     * Handle the announcement "created" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function created(Announcement $announcement)
    {
        dd(__METHOD__);
    }

    /**
     * Handle the announcement "updated" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function updated(Announcement $announcement)
    {
        dd(__METHOD__);
    }

    /**
     * Handle the announcement "deleted" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function deleted(Announcement $announcement)
    {
        dd(__METHOD__);
    }

    /**
     * Handle the announcement "restored" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function restored(Announcement $announcement)
    {
        dd(__METHOD__);
    }

    /**
     * Handle the announcement "force deleted" event.
     *
     * @param  \App\Models\Announcements\Base\Announcement  $announcement
     * @return void
     */
    public function forceDeleted(Announcement $announcement)
    {
        dd(__METHOD__);
    }
}
