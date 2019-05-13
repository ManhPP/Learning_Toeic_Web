<?php

namespace App\Policies;


use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class Part6ParagraphPolicy
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

    public function addPara(Account $user){
        return true;
    }

    public function updatePara(Account $account){
        return true;
    }

    public function deletePara(Account $account)
    {
        return true;
    }
}
