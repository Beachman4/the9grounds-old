<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Glide\ServerFactory;

class GlideServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('League\Glide\Server', function($app) {
            $filesystem = $app->make('Illuminate\Contracts\Filesystem\Filesystem');

            return ServerFactory::create([
                'source'    =>  $filesystem->getDriver(),
                'cache' =>  $filesystem->getDriver(),
                'source_path_prefix'    =>  $_SERVER['DOCUMENT_ROOT'].'/assets/img/',
                'cache_path_prefix' =>  $_SERVER['DOCUMENT_ROOT'].'/assets/img/.cache',
            ]);
        });
    }
}
