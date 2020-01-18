<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
       /* $path=explode('/',request()->path());
        if(isset($path[1])&&$path[1]=='rep'){
            $repo=ucfirst($path[2]);
            $repoRaw="App\Repositories\ $repo \ $repo";
            $repoPath=str_replace(' ','',$repoRaw);
            $repository=$repoPath.'Repository';
            $repoInterface=$repoPath.'RepositoryInterface';
;
           $this->app->singleton(
               $repoInterface, $repository
            );
        }*/
        $this->app->singleton('App\Repositories\Post\PostRepositoryInterface','App\Repositories\Post\PostRepository');
    }
}
