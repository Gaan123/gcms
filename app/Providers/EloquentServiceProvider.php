<?php

namespace App\Providers;

use App\Model\Media;
use App\Observers\MediaObserver;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Media::observe(MediaObserver::class);
    }
}
