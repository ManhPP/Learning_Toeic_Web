<?php

namespace App\Policies;

use App\Account;
use App\ReplyComment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyCommentPolicy
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

    public function updateComment(Account $user, ReplyComment $cmt){
        if($user->id == $cmt->account->id){
            return true;
        }else{
            return false;
        }
    }
    public function deleteComment(Account $user, ReplyComment $cmt){
        if($user->id == $cmt->account->id){
            return true;
        }else{
            return false;
        }
    }
}
