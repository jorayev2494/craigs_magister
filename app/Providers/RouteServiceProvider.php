<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function() {
            #region Admin Route and Controller
            $this->adminApiRoute();
            #endregion

            #region User Route and Controller
            $this->userApiRoute();
            #endregion

            #region User Route and Controller
            $this->publicApiRoute();
            #endregion

            $this->webRoute();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

    private function adminApiRoute() : void
    {
        Route::prefix('api/admin')
                    ->name('api.admin.')
                    ->middleware('api')
                    ->namespace($this->namespace . '\Admin')
                    ->group(base_path('routes/api.admin.php'));
    }

    private function userApiRoute() : void
    {
        Route::prefix('api')
                ->name('api.')
                ->middleware('api')
                ->namespace($this->namespace . '\User')
                ->group(base_path('routes/api.php'));
    }

    private function publicApiRoute() : void
    {
        Route::prefix('api')
                ->name('api.')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.public.php'));
    }

    private function webRoute() : void
    {
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
    }
}
