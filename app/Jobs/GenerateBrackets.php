<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Tournament;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateBrackets extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $tournament;

    private $generator;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Tournament $tournament, Tournament\TournamentBracketGenerator $generator)
    {
        $this->tournament = $tournament;
        $this->generator = $generator;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
