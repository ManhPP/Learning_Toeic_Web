<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Part6;
use App\Part6Paragraph;
use App\ReadingPart;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Scalar\String_;

class Part6ParagraphController extends Controller
{

    public function listPart6(){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addReading', ReadingPart::class)){
            return redirect(Route('mylogincontroller.login'));
        }

        $data = Part6Paragraph::all();
        $sum = Part6Paragraph::count();
        $userLogin = Auth::guard("accounts")->user();
        return view('add_part_6',['arrDoan'=>$data,'sum'=>$sum, 'userLogin'=>$userLogin]);
    }

    public function listPart6Para(){

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addPara', Part6Paragraph::class)){
            return redirect(Route('mylogincontroller.login'));
        }
        $data = Part6Paragraph::all();
        $sum = Part6Paragraph::count();
        return view('add_part6_paragraph',['arrDoan'=>$data,'sum'=>$sum, 'userLogin'=>$userLogin]);
    }

    public function add(Request $request){
        $arr = array();
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addPara', Part6Paragraph::class)){
            return response()->json(['redirect'=>(Route('mylogincontroller.login'))]);
        }

        $para=$request["para"];
        error_log($para);
        // convert to model paraPart6
        $json = json_decode($para,true);

        $part6Para = new Part6Paragraph();
        try{
            $check=$part6Para->save();
            array_push($arr, Part6Paragraph::max('id'));
            error_log("a");
            if($check > 0)
            {
                foreach (((Object)$json)->listCauPart6 as $jsonCau){
                    $cau = $part6Para->part6()->create($jsonCau);
                    array_push($arr, $cau->id);
                }
            }
            return response()->json($arr, 200);
        }catch(\Exception $e){
            error_log("error".$e->getMessage());
        }
        $arr[0] = 'false';

        return response()->json($arr, 200);

    }

    public function update(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updatePara', Part6Paragraph::class)){
            return (Route('mylogincontroller.login'));
        }

        try{
            $para=$request["para"];
            error_log($para);
            // convert to model paraPart6
            $obj = json_decode($para,true);

            $part6Para =  Part6Paragraph::find(((Object)$obj)->id);

            foreach (((Object)$obj)->listCauPart6 as $cau){
                    $part6 =Part6::find(((Object)$cau)->id);
                    $part6->idDoan  = $part6Para->id;
                    $part6->cauHoi  = ((Object)$cau)->cauHoi;
                    $part6->daA     = ((Object)$cau)->daA;
                    $part6->daB     = ((Object)$cau)->daB;
                    $part6->daC     = ((Object)$cau)->daC;
                    $part6->daD     = ((Object)$cau)->daD;
                    $part6->daDung  = ((Object)$cau)->daDung;
                    $part6->save();
            }
            $part6Para->save;
            return 'true';

        }catch(\Exception $ex){
            error_log($ex->getMessage());
        }
        return 'false';
    }

    public function delete(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('deletePara', Part6Paragraph::class)){
            return (Route('mylogincontroller.login'));
        }

        try{
            $id = $request->id;
            $part6Para = Part6Paragraph::find($id);
            error_log("request ".$request->id);
            foreach ($part6Para->part6 as $cau){
                $part6 = Part6::find($cau->id);
                error_log($part6->delete());
            }
            foreach ($part6Para->readingPart as $partDoc){
                $partDoc->part6Paragraphs()->detach();
                $partDoc->delete();
            }

            $deleted = $part6Para->delete();
            error_log($deleted);
            if($deleted>0) {
                return 'true';
            }

        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return "false";
    }

}
