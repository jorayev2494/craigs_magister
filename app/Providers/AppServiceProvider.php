<?php

namespace App\Providers;

use App\Models\Country;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;
use App\Repositories\Eloquent\CountryRepository;
use App\Repositories\Eloquent\EloquentRepositoryFactory;
use App\Repositories\Eloquent\Interfaces\IEloquentRepositoryFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\{ServiceProvider, Str};
use Mockery;
use Mockery\Mock;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEloquentRepositoryFactory::class, EloquentRepositoryFactory::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
