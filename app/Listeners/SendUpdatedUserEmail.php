<?php

namespace App\Listeners;

use App\Events\UserWasUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Users\UserEmails;

class SendUpdatedUserEmail implements ShouldQueue
{
    private $email;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserEmails $email)
    {
        $this->email = $email;
    }

    /**
     * Handle the event.
     *
     * @param  UserWasUpdated  $event
     * @return void
     */
    public function handle(UserWasUpdated $event)
    {
        $this->email->send($event->user, "update");
    }
}
