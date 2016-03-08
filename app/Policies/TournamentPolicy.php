<?php

namespace App\Policies;

use App\Tournament;
use Illuminate\Auth\Access\HandlesAuthorization;

class TournamentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update($user, Tournament $tournament)
    {
        return ($user->id === $tournament->creator_id) || ($user->admin === 1);
    }
    public function delete($user, Tournament $tournament)
    {
        return ($user->id === $tournament->creator_id) || ($user->admin === 1);
    }
    public function signUp($user)
    {
        return Session::has('user_id');
    }
}
