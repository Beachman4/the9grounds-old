<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use User;
use Admin;

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
        $this->admin_stuff();
        $this->errorAdmin();
        $this->errorUser();
        $this->errorUserLogged();
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
    public function errorUserLogged()
    {
        view()->composer('master.error', function ($view) {
            $view->with('UserLogged', User::isSignedIn());
        });

    }

    public function errorUser()
    {
        view()->composer('master.error', function ($view) {
            $view->with('user', User::Get());
        });
    }

    public function errorAdmin()
    {
        view()->composer('master.error', function ($view) {
            $view->with('admin', User::isAdmin());
        });
    }

    public function admin_stuff()
    {
        view()->composer('master.admin', function ($view) {
            $view->with('title', Admin::getTitle())->with('buttons', Admin::getButtons());
        });
    }
}
