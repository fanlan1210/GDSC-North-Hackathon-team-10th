<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserPlace;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPlacePolicy
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

    public function store(User $user, UserPlace $place)
    {
        return $user->id == $place->user_id;
    }
}
