<?php

namespace App\Providers;

use App\Http\View\Composer\Media\MediaListComposer;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
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
        view()->share('mediaModal',false);
        view()->composer(['admin.*.edit','admin.*.new'],function ($view)
        {
            $view->with('mediaModal', true);
        });
        view()->composer('admin.components.global.media.modal',MediaListComposer::class);
    }
}
