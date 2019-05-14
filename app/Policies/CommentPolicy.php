<?php

namespace App\Policies;

use App\Account;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function addComment(Account $user){
        return true;
    }

    public function updateComment(Account $user, Comment $cmt){
        if($user->id == $cmt->account->id){
            return true;
        }else{
            return false;
        }
    }
    public function deleteComment(Account $user, Comment $cmt){
        errer_log($user->hasRole);
        if($user->id == $cmt->account->id || $user->hasRole == "ROLE_ADMIN"){
            return true;
        }else{
            return false;
        }
    }
}
