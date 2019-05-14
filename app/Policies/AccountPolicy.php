<?php

namespace App\Policies;


use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
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

    public function before(Account $user){
        if($user!=null && $user->active == 1){
            return null;
        }else{
            return false;
        }
    }

    public function manage(Account $user){
        if($user->hasRole == "ROLE_ADMIN")
            return true;
        else
            return false;
    }

    public function getIndexUpdate(Account $user){
        return true;
    }

    public function update(Account $user, Account $user2){
        if($user->hasRole == "ROLE_ADMIN" || ($user->id == $user2->id))
            return true;
        else
            return false;
    }

    public function delete(Account $user, Account $user2){
        if($user->hasRole == "ROLE_ADMIN" || ($user->id == $user2->id))
            return true;
        else
            return false;

    }
}
