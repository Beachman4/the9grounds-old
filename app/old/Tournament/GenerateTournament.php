<?php
/**
 * Created by PhpStorm.
 * User: Aylon
 * Date: 4/19/2016
 * Time: 2:35 PM
 */

namespace App\Tournament;


use App\Repository\TournamentRepository;
use App\Tournament;

class GenerateTournament
{
    private $tournament;

    private $rep;

    /**
     * GenerateTournament constructor.
     * @param Tournament $tournament
     * @param TournamentRepository $rep
     */
    public function __construct(Tournament $tournament, TournamentRepository $rep)
    {
        $this->tournament = $tournament;
        $this->rep = $rep;
    }

    public function generateGroups()
    {
        $groups = $this->tournament->groups()->get();

    }

    public function generateBrackets()
    {

    }
}