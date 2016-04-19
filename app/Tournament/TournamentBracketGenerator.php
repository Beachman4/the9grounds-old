<?php
/**
 * Created by PhpStorm.
 * User: Aylon
 * Date: 4/18/2016
 * Time: 2:36 PM
 */

namespace App\Tournament;


use App\Tournament;
use App\TournamentsGroups;

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
        $participants = $this->tournament->participants()->get();
        shuffle($participants);
        array_splice($participants, $this->tournament->group_num);
        foreach($participants as $group) {
            $players = [];
            foreach ($group as $player) {
                array_push($players, $player->id);
            }
            $group = new TournamentsGroups();
            $players = implode(',', $players);
            $group->users = $players;
            $group->tournament_id = $this->tournament->id;
            $group->save();
            $this->generateGroupMatches($group);
        }
    }

    private function generateGroupMatches(TournamentsGroups $group)
    {
        $users = explode(",", $group->users);
        for($i = 0; $i < count($users);$i++) {
            for($j = $i+1;$j < count($users);$j++) {
                $match = new TournamentsGroupsMatches();
                $players = $users[$i]->id.",".$users[$j]->id;
                $match->players = $players;
                $match->group_id = $group->id;
                $match->save();
            }
        }
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