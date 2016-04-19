<?php

namespace App\Events;

use App\Events\Event;
use App\Tournament;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TournamentWasCreated extends Event
{
    use SerializesModels;

    public $tournament;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
