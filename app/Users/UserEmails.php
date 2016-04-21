<?php
/**
 * Created by PhpStorm.
 * User: beach
 * Date: 4/18/2016
 * Time: 12:42 AM
 */

namespace App\Users;

use App\Users;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class UserEmails
{
    private $mailer;

    private $views = [
        "confirm"   =>  "email.registered",
        "forgot"    =>  "email.forgot",
        "update"    =>  "email.update"
    ];

    /**
     * UserEmails constructor.
     * @param $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Users $user, $type, $token = false)
    {
        switch($type) {
            case "confirm":
                $this->confirm($user);
                break;
            case "forgot":
                $this->forgot($user, $token);
                break;
            case "update":
                $this->update($user);
                break;
            case "aylon":
                $this->aylon($user);
                break;
            default:
                // TODO: Do some logging to catch errors if they happen
                break;
        }
    }

    private function confirm(Users $user)
    {
        $this->mailer->send($this->views["confirm"], ['user'    =>  $user], function (Message $m) use ($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds');

            $m->to($user->email)->subject('Confirm your account');
        });
        $this->mailer->send($this->views["confirm"], ['user'    =>  $user], function (Message $m) use ($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds');

            $m->to('aylon@groupm7.com')->subject('User has registered');
        });
    }

    private function forgot(Users $user, $token)
    {
        $this->mailer->send($this->views["forgot"], ['user' => $user, 'token' => $token], function(Message $m) use($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds')->to($user->email)->subject('Forgot Password');
        });
    }

    private function update(Users $user)
    {
        $this->mailer->send($this->views["update"], ['user' => $user], function(Message $m) use($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds')->to($user->email)->subject('Your account has been updated');
        });
    }

    private function aylon(Users $user)
    {

    }
}