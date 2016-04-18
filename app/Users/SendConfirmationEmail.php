<?php


namespace App\Users;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use App\Users;


/*
 * DELETE SOON
 * Going to be doing research to make sure condensing the emails to one email controller is good practice -- Regardless, I prefer this method as there aren't as many files
 */

class SendConfirmationEmail
{
    private $mailer;

    protected $view = 'email.registered';

    /**
     * SendConfirmationEmail constructor.
     * @param $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Users $user)
    {
        $this->mailer->send($this->view, ['user'    =>  $user], function (Message $m) use ($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds');

            $m->to($user->email)->subject('Confirm your account');
        });
    }


}