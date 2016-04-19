<?php
/**
 * Created by PhpStorm.
 * User: Aylon
 * Date: 4/18/2016
 * Time: 2:36 PM
 */

namespace App\Tournament;


use App\Tournament;

class TournamentBracketGenerator
{
    private $tournament;

    /**
     * TournamentBracketGenerator constructor.
     * @param $tournament
     */
    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    public function generate()
    {
        if ($this->tournament->stage == 'double') {
            $this->groups();
        } else {
            $this->brackets();
        }
    }

    private function groups()
    {

    }

    private function brackets()
    {
        $participants = $this->tournament->participants()->get();
        shuffle($participants);
        array_splice($participants, 2);
        foreach($participants as $bracket) {
            $this->tournament->brackets()->create([
                'player1' => $bracket[0]->id,
                'player2' => $bracket[1]->id,
                'result' => '0:0'
            ]);
        }
    }



}