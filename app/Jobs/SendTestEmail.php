<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Users;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTestEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $user = $this->user;
        $mailer->send('email.registered', ['user'   =>  $user], function($m) use ($user) {
            $m->to($user->email)->subject('Testing Jobs');
            $m->from('yoda@the9grounds.com');
        });
    }
}
