<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use User;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->UserLogged();
        $this->user();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function UserLogged()
    {
        view()->share('UserLogged', User::isSignedIn());
    }

    public function user()
    {
        view()->share('user', User::Get());
    }
}
