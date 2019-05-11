<?php

namespace App\Http\Controllers;

use App\Account;
use App\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function comment(Request $request){
        $noiDung = $request->noiDung;
        $idBTL = $request->idBTL;
        $cmt = new Comment();
        $cmt->noiDung = $noiDung;
        $cmt->idBTL = $idBTL;
        $now = Carbon::now('GMT+7');
//        error_log(."adasas");
        $cmt->ngayDang = $now->toDateTimeString();

        //get acc in session
        $acc=Account::find(1);

        $cmt->idAcc = $acc->id;
        $check = $cmt->saveOrFail();
        if($check >0){
            return 'true';
        }
        return 'false';
    }

    public function getSumComment(Request $request){
        $idBTL = $request['idBTL'];

        $arr = Comment::where('idBtl',$idBTL)->get();
        error_log(count($arr));
        if(count($arr) >0){
            return count($arr);
        }
        return 0;
    }

    public function update(Request $request){
        $id = $request['id'];

        $cmt = Comment::find($id);

        //get Acc from session
        $acc = Account::find(1);
        if($acc->id == $cmt->idAcc){
            $cmt->noiDung = $request['noiDung'];
            $check = $cmt->save();
            if($check >0){
                return 'true';
            }
        }

        return 'false';
    }

    public function delete(Request $request){
        $idCmt = $request['id'];
        $cmt = Comment::find($idCmt);

        //get Acc from session
        $acc = Account::find(1);

        if($acc->id == $cmt->idAcc){
            $cmt->replyComment()->delete();
            $cmt->report()->delete();
            $check = $cmt->delete();
            if($check >0){
                error_log("done");
                return 'true';
            }
        }
        return 'false';
    }
}
