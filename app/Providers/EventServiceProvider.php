<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserWasCreated' => [
            'App\Listeners\ConfirmationEmailListener',
        ],
        'App\Events\UserHasForgot' => [
            'App\Listeners\SendForgotEmailListener',
        ],
        'App\Events\UserWasUpdated' => [
            'App\Listeners\SendUpdatedUserEmail',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
        //
    }
}
