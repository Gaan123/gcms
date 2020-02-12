<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\Image;
use Optix\Media\Facades\Conversion;

class ConversionServiceProvider extends ServiceProvider
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
        foreach (config('media.images') as $key => $size):
            Conversion::register($key, function (Image $image) use ($size) {
                return $image->fit($size[0], $size[1]);
            });
        endforeach;
    }
}
