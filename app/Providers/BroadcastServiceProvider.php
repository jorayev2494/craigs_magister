<?php

namespace App\Providers;

use App\Models\Interfaces\IBaseModel;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes(
            // [
            //     'middleware' => [
            //         'auth:' . IBaseAppGuards::ADMIN
            //     ]
            // ]
        );

        require base_path('routes/channels.php');
    }
}
