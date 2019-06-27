<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Job\IJobRepository;
use App\Repositories\Job\EloquentJobRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IJobRepository::class, EloquentJobRepository::class);
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
