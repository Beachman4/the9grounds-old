<?php

namespace App\Listeners;

use App\Events\UserHasForgot;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Users\UserEmails;

class SendForgotEmailListener implements ShouldQueue
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
     * @param  UserHasForgot  $event
     * @return void
     */
    public function handle(UserHasForgot $event)
    {
        $this->email->send($event->user, "forgot", $event->token);
    }
}
