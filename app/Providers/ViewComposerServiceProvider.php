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
        $this->admin();
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
        view()->composer('master.master', function ($view) {
            $view->with('UserLogged', User::isSignedIn());
        });

    }

    public function user()
    {
        view()->composer('master.master', function ($view) {
            $view->with('user', User::Get());
        });
    }

    public function admin()
    {
        view()->composer('master.master', function ($view) {
            $view->with('admin', User::isAdmin());
        });
    }
}
