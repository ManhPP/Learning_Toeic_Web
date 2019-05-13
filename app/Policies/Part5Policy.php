<?php

namespace App\Policies;


use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class Part5Policy
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
        if($user!=null && $user->active == 1 && $user->hasRole == "ROLE_ADMIN" ){
            return null;
        }else{
            return false;
        }
    }


    public function manage(Account $user){
        return true;
    }

    public function addCau(Account $user){
        return true;
    }

    public function updateCau(Account $account){
        return true;
    }

    public function deleteCau(Account $account)
    {
        return true;
    }
}
