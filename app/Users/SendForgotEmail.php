<?php


namespace App\Users;

use App\Users;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

/*
 * DELETE SOON
 * Going to be doing research to make sure condensing the emails to one email controller is good practice -- Regardless, I prefer this method as there aren't as many files
 */

class SendForgotEmail
{
    private $mailer;

    protected $view = 'email.forgot';

    /**
     * SendForgotEmail constructor.
     * @param $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Users $user, $token)
    {
        $this->mailer->send($this->view, ['user' => $user, 'token' => $token], function(Message $m) use($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds')->to($user->email)->subject('Forgot Password');
        });
    }


}