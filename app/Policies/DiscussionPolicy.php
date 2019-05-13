<?php

namespace App\Policies;

use App\Account;
use App\Discussion;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscussionPolicy
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
        if($user!=null && $user->active == 1 ){
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

    public function addDiscuss(Account $user){
        return true;
    }

    public function deleteDiscuss(Account $user, Discussion $discussion){
        if($user->id == $discussion->account->id || $user->hasRole == "ROLE_ADMIN"){
            return true;
        }else{
            return false;
        }
    }

    public function updateDiscuss(Account $user, Discussion $discussion){
        if($user->id == $discussion->account->id){
            return true;
        }else{
            return false;
        }
    }
}
