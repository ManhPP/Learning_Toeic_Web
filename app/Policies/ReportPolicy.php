<?php

namespace App\Policies;

use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
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
        if($user!=null){
            return null;
        }else{
            return false;
        }
    }

    public function addReport(Account $user){
        return true;
    }

    public function changeStatusProcess(Account $user){
        if($user->hasRole == 'ROLE_ADMIN'){
            return true;
        }else{
            return false;
        }
    }

}
