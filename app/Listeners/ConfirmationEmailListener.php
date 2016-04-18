<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Users;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Users\UserEmails;

class ConfirmationEmailListener implements ShouldQueue
{

    private $email;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserEmails $emails)
    {
        $this->email = $emails;
    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $this->email->send($event->user, "confirm");
    }
}
