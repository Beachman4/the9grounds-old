<?php

namespace App\Providers;

use App\Clan;
use App\Policies\ClanPolicy;
use App\Tournament;
use App\Policies\TournamentPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Tournament::class   =>  TournamentPolicy::class,
        Clan::class =>  ClanPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('admin', function ($user) {
            return $user->admin === 1;
        });


    }
}
