<?php

namespace App\Http\Controllers;

use App\ReplyComment;
use App\Account;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReplyCommentController extends Controller
{
    public function reply(Request $request){
        $noiDung = $request->noiDung;
        $idCMT = $request->idCMT;
        $reply = new ReplyComment();
        $reply->noiDung = $noiDung;
        $reply->idCmt = $idCMT;
        $now = Carbon::now('GMT+7');
//        error_log(."adasas");
        $reply->ngayDang = $now->toDateTimeString();

        //get acc in session
        $acc=Account::find(1);

        $reply->idAcc = $acc->id;
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
            $acc = Account::find(1);

            array_push($arr,$acc);

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

        //get Acc from session
        $acc = Account::find(1);

        if($acc->id == $reply->idAcc){
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

        //get Acc from session
        $acc = Account::find(1);

        if($acc->id == $reply->idAcc){
            $check = $reply->delete();
            if($check >0){
                return 'true';
            }
        }

        return 'false';
    }
}
