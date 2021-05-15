<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\PseudoTypes\False_;

class UserPolicy
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

    public function view(User $user, User $target)
    {
        if($user->isAdmin() | $user->id == $target->id )
            return true;
        else
            return false;

    }
}
