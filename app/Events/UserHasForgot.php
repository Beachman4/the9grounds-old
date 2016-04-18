<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Users;

class UserHasForgot extends Event
{
    use SerializesModels;

    public $user;

    public $token;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Users $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
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
