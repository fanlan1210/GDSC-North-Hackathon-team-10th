<?php

namespace App\Policies;

use App\Models\PlaceArea;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlaceAreaPolicy
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

    public function store(User $user)
    {
        if($user->isAdmin())
            return true;
        else
            return false;
    }
}
