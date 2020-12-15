<?php

namespace App\Providers;

use App\Models\Announcements\Base\Announcement;
use App\Observers\Announcement\AnnouncementChangeStatusObserver;
use App\Observers\Announcement\AnnouncementObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Announcement::observe(AnnouncementObserver::class);
        // Announcement::observe(AnnouncementChangeStatusObserver::class);
    }
}
