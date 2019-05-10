<?php

namespace App\Http\Controllers;

use App\Account;
use App\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function home(Request $request){
        $acc = Account::find(1);
        $arrBtl = Discussion::all();
        $arrNumCmt = array();
        foreach ($arrBtl as $btl){
            $numCmt = count($btl->comment);
            foreach ($btl->comment as $cmt){
                $numCmt += count($cmt->replyComment);
            }
            array_push($arrNumCmt,$numCmt);
        }
        return view('user_bai_thaoluan_home',['acc'=>$acc,'arrBtl'=>$arrBtl,'arrNumCmt'=>$arrNumCmt,
        'numBtl'=>count($arrBtl),'numUser'=>Account::all()->count()]);
    }

   public function accessDiscussion(Request $request){
       $id = $request["id"];
       $btl = Discussion::find($id);
       $view = $btl->accessCount;
       $btl->accessCount = round($view,0,PHP_ROUND_HALF_DOWN)+1;
       $btl->save();
       $acc = Account::find(1);
       return view('user-thaoluan-view',['btl'=>$btl,'acc'=>$acc]);
   }

   public function indexAddDiscussion(Request $request){
       $acc = Account::find(1);
        return view('them_bai_thaoluan',['acc'=>$acc]);
   }

   public function indexUpdateDiscussion(Request $request){
       $id = $request["id"];
       $btl = Discussion::find($id);
       $acc = Account::find(1);
        return view('update_bai_thaoluan',['acc'=>$acc,'btl'=>$btl]);
   }
}
