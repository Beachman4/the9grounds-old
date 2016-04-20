<?php

namespace App\Listeners;

use App\Events\TestBroadCast;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestBroadcastListener
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
     * @param  TestBroadCast  $event
     * @return void
     */
    public function handle(TestBroadCast $event)
    {
        //
    }
}
