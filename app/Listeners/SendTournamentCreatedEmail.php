<?php

namespace App\Listeners;

use App\Events\TournamentWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTournamentCreatedEmail implements ShouldQueue
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
     * @param  TournamentWasCreated  $event
     * @return void
     */
    public function handle(TournamentWasCreated $event)
    {
        //
    }
}
