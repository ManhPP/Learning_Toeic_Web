<?php

namespace App\Policies;

use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
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

    public function doTest(Account $user){
        if( $user->hasRole == "ROLE_USER" || $user->hasRole == "ROLE_ADMIN"){
            return true;
        }else{
            return false;
        }
    }

    public function manage(Account $user){
        if($user->hasRole == "ROLE_ADMIN"){
            return true;
        }else{
            return false;
        }
    }

    public function addTest(Account $user){
        if($user->hasRole == "ROLE_ADMIN"){
            return true;
        }else{
            return false;
        }
    }

    public function updateTest(Account $user){
        if($user->hasRole == "ROLE_ADMIN"){
            return true;
        }else{
            return false;
        }
    }

    public function deleteTest(Account $user)
    {
        if($user->hasRole == "ROLE_ADMIN"){
            return true;
        }else{
            return false;
        }
    }
}
