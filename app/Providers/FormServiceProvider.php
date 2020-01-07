<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
class FormServiceProvider extends ServiceProvider
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
        Form::component('bsText', 'admin.components.form.text', ['name', 'value' => null, 'attributes' => [],'label'=>false]);
        Form::component('bsTextarea', 'admin.components.form.textarea', ['name', 'value' => null, 'attributes' => [],'label'=>false]);
    }
}
