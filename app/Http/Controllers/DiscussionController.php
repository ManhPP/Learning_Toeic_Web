<?php

namespace App\Http\Controllers;

use App\Account;
use App\Comment;
use App\Discussion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class DiscussionController extends Controller
{
    public function home(Request $request){
        $userLogin = Auth::guard("accounts")->user();
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
        'numBtl'=>count($arrBtl),'numUser'=>Account::all()->count(), 'userLogin'=>$userLogin]);
    }

   public function accessDiscussion(Request $request){
       $id = $request["id"];
       $userLogin = Auth::guard("accounts")->user();
       $btl = Discussion::find($id);
       $view = $btl->accessCount;
       $btl->accessCount = $view+1;
       $btl->save();

       $acc = Account::find(35);

       $arrNumReply = array();

       foreach ($btl->comment as $cmt){
           array_push($arrNumReply,count($cmt->replyComment));
       }
       return view('user-thaoluan-view',['btl'=>$btl,'userLogin'=>$userLogin,'listSumReply'=>$arrNumReply]);
   }

   public function upload_Img(Request $request){

       $userLogin = Auth::guard("accounts")->user();
       if( $userLogin==null || !$userLogin->can('addDiscuss', Discussion::class)){
           return response()->json(['redirect'=>(Route('mylogincontroller.login'))]);
       }

       try{
           $file = $request->file("file-image");
           $fileName = time().'.'.$file->getClientOriginalExtension();
           $des=public_path('/images_btl');
           $file->move($des,$fileName);
           return response()->json(["pathFile"=>"images_btl"."/".$fileName], 200);
       }catch(Exception $e){

       }
       return 'false';
   }

   public function indexAdd(Request $request){
       $userLogin = Auth::guard("accounts")->user();

       $userLogin = Auth::guard("accounts")->user();

       if( $userLogin==null || !$userLogin->can('addDiscuss', Discussion::class)){
           return redirect(Route('mylogincontroller.login'));
       }

       return view('them_bai_thaoluan',['userLogin'=>$userLogin]);

   }

   public function addDiscussion(Request $request){
       $userLogin = Auth::guard("accounts")->user();

       if( $userLogin==null || !$userLogin->can('addDiscuss', Discussion::class)){
           return (Route('mylogincontroller.login'));
       }
       $tieude = $request["tieuDe"];
       $noidung = $request["noiDung"];
       $btl = new Discussion();
       $btl->tieuDe = $tieude;
       $btl->noiDung = $noidung;
       $btl->accessCount = 0;
       $now = Carbon::now('GMT+7');
       $btl->ngayDang = $now->toDateTimeString();

       //set User in session
       $btl->idAcc = $userLogin->id;
       $check = $btl->saveOrFail();
       if($check >0){
           return 'true';
       }
       return 'false';
   }

   public function indexUpdate(Request $request){

       $id = $request["id"];
       $btl = Discussion::find($id);
       $userLogin = Auth::guard("accounts")->user();

       if( $userLogin==null || !$userLogin->can('updateDiscuss', $btl)){
           return redirect(Route('mylogincontroller.login'));
       }



       return view('update_bai_thaoluan',['userLogin'=>$userLogin,'btl'=>$btl]);
   }


   public function update(Request $request)
   {
       $id = $request["id"];
       $tieuDe = $request["tieuDe"];
       $noiDung = $request["noiDung"];

       $btl = Discussion::find($id);

       $btl->tieuDe = $tieuDe;
       $btl->noiDung = $noiDung;

       $userLogin = Auth::guard("accounts")->user();

       if( $userLogin==null || !$userLogin->can('updateDiscuss', $btl)){
           return (Route('mylogincontroller.login'));
       }

       $check = $btl->save();
       error_log($check);
       if ($check > 0) {
           return 'true';
       }
       return 'false';
   }

   public function indexAdminManager(){

       $userLogin = Auth::guard("accounts")->user();

       if( $userLogin==null || !$userLogin->can('manage', Discussion::class)){
           return redirect(Route('mylogincontroller.login'));
       }

        $arrNumCmt = array();
        $arrBtl = Discussion::all();
        foreach($arrBtl as $btl){
            $arrCmt = $btl->comment;
            $num = count($arrCmt);
            foreach ($arrCmt as $cmt){
                $num+= $cmt->replyComment()->count();
            }
            array_push($arrNumCmt,$num);
        }
        return View("admin_thaoluan")->with("arrBtl", $arrBtl)->with("arrNumCmt", $arrNumCmt);
   }

   public function delete(Request $request){
        $arrId = $request["arrId"];
        try{
            $arrDiscuss = Discussion::findMany($arrId);
            $userLogin = Auth::guard("accounts")->user();

            if( $userLogin==null || !$userLogin->can('deleteDiscuss', Discussion::class)){
                return (Route('mylogincontroller.login'));
            }

            foreach($arrDiscuss as $discuss){
                $arrCmt = $discuss->comment;
                foreach ($arrCmt as $cmt) {
                    $cmt->report()->delete();
                    $cmt->replyComment()->delete();
                }
                $discuss->comment()->delete();
                $discuss->report()->delete();
                $discuss->delete();
            }
            return "true";
        }catch (\Exception $e){

        }
        return "false";
   }
}
