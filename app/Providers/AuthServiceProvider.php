<?php

namespace App\Providers;

use App\Models\Announcements\Base\Announcement;
use App\Policies\AnnouncementPolicy;
use App\Policy\Gates\IRegisterGate;
use App\Policy\Gates\RegisterGateClasses;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    private IRegisterGate $registerGate;

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Announcement::class => AnnouncementPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(RegisterGateClasses $registerGateClasses)
    {
        $this->registerGate = $registerGateClasses;
        
        $this->registerPolicies();
        $this->registerGate->registerGates();
    }
}
