<?php

namespace App\Listeners;

use App\Events\OnShoutboxMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageReceived
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OnShoutboxMessage  $event
     * @return void
     */
    public function handle(OnShoutboxMessage $event)
    {
        //
    }
}
