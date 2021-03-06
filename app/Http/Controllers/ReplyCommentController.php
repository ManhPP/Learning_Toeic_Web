<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\ReplyComment;
use App\Account;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReplyCommentController extends Controller
{
    public function reply(Request $request){

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addComment', ReplyComment::class)){
            return (Route('mylogincontroller.login'));
        }


        $noiDung = $request->noiDung;
        $idCMT = $request->idCMT;
        $reply = new ReplyComment();
        $reply->noiDung = $noiDung;
        $reply->idCmt = $idCMT;
        $now = Carbon::now('GMT+7');
//        error_log(."adasas");
        $reply->ngayDang = $now->toDateTimeString();

        //get acc in session
        $userLogin = Auth::guard("accounts")->user();

        $reply->idAcc = $userLogin->id;
        $check = $reply->saveOrFail();
        if($check >0){
            return 'true';
        }
        return 'false';
    }

    public function getListReply(Request $request){
        $id = $request['id'];
        error_log($id);
        $begin = $request['begin'];

        $arr = array();
        $arrReply = ReplyComment::where('idCmt',$id)->limit(10)->offset($begin)->get();
        error_log(count($arrReply));
        if(count($arrReply) >0){

            foreach ($arrReply as $reply){
                $reply->idAcc = Account::find($reply->idAcc);

            }

            array_push($arr,$arrReply);

            //get acc from session
            $userLogin = Auth::guard("accounts")->user();
            if($userLogin == null){
                $userLogin = new Account();
                $userLogin->id=-1;
                $userLogin->hasRole = "NO_ROLE";
            }

            array_push($arr,$userLogin);

            return $arr;
        }
        return 'false';
    }

    public function getSumReply(Request $request){
        $idCmt = $request['idCMT'];

        $arrReply = ReplyComment::where('idCmt',$idCmt)->get();
        error_log(count($arrReply));
        if(count($arrReply) >0){
            return count($arrReply);
        }
        return 0;
    }

    public function update(Request $request){

        $idRCmt = $request['id'];
        $noiDung = $request['noiDung'];

        $reply = ReplyComment::find($idRCmt);

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updateComment', $reply)){
            return (Route('mylogincontroller.login'));
        }


        if($userLogin->id == $reply->idAcc){
            $reply->noiDung = $noiDung;
            $check = $reply->save();
            if($check >0){
                return 'true';
            }
        }

        return 'false';
    }

    public function delete(Request $request){
        $idRCmt = $request['id'];
        $reply = ReplyComment::find($idRCmt);



        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('deleteComment', $reply)){
            return (Route('mylogincontroller.login'));
        }
        try {
            $reply->report()->delete();
            $reply->delete();
            return 'true';
        }catch (\Exception $e){

        }
        return 'false';
    }
}
