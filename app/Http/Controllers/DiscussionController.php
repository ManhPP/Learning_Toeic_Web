<?php

namespace App\Http\Controllers;

use App\Account;
use App\Comment;
use App\Discussion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DiscussionController extends Controller
{
    public function home(Request $request){
        $acc = Account::all();
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
//       $arrCmt = Comment::orderBy('id','desc')->where('idBtl',$id)->get();
//       error_log(count($arrCmt));
//       $btl->comment = $arrCmt;or
       $view = $btl->accessCount;
       $btl->accessCount = $view+1;
       $btl->save();
       $acc = Account::find(1);

       $arrNumReply = array();

       foreach ($btl->comment as $cmt){
           array_push($arrNumReply,count($cmt->replyComment));
       }
       return view('user-thaoluan-view',['btl'=>$btl,'acc'=>$acc,'listSumReply'=>$arrNumReply]);
   }

   public function upload_Img(Request $request){
//       try{
           $file = $request->file("file-image");
           $fileName = time().'.'.$file->getClientOriginalExtension();
           $des=public_path('/images_btl');
           $file->move($des,$fileName);
           return response()->json(["pathFile"=>"images_btl"."/".$fileName], 200);
//       }catch(Exception $e){
//
//       }
       return 'false';
   }

   public function indexAdd(Request $request){
       $acc = Account::find(1);
        return view('them_bai_thaoluan',['acc'=>$acc]);
   }

   public function addDiscussion(Request $request){
        $tieude = $request["tieuDe"];
        $noidung = $request["noiDung"];
        $btl = new Discussion();
        $btl->tieuDe = $tieude;
        $btl->noiDung = $noidung;
        $btl->accessCount = 0;
        $now = Carbon::now('GMT+7');
//        error_log(."adasas");
        $btl->ngayDang = $now->toDateTimeString();

        //set User in session
        $acc = Account::find(1);
        $btl->idAcc = $acc->id;
//        $acc->discussion()->create($btl);
        $check = $btl->saveOrFail();
        if($check >0){
            return 'true';
        }
        return 'false';
   }

   public function indexUpdate(Request $request){
       $id = $request["id"];
       $btl = Discussion::find($id);
       $acc = Account::find(1);
        return view('update_bai_thaoluan',['acc'=>$acc,'btl'=>$btl]);
   }

   public function update(Request $request){
       $id = $request["id"];
       $tieuDe = $request["tieuDe"];
       $noiDung = $request["noiDung"];

       $btl = Discussion::find($id);

       $btl->tieuDe = $tieuDe;
       $btl->noiDung = $noiDung;
       $check = $btl->save();
       error_log($check);
       if($check > 0){
           return 'true';
       }
       return 'false';
   }
}
