<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Part7;
use App\Part7Paragraph;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PhpParser\Node\Expr\Cast\Object_;

class Part7ParagraphController extends Controller
{


    public function getPart7Paragraph(Request $request){

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('manage', Part7Paragraph::class)){
            return redirect(Route('mylogincontroller.login'));
        }

        $arrDoan = Part7Paragraph::all();
        $sum = Part7Paragraph::count();
        return view('manager_para_part7')
            ->with("arrDoan", $arrDoan)->with("sum", $sum)
            ->with('userLogin', $userLogin);
    }

    public function uploadFile(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addPara', Part7Paragraph::class)){
            return response()->json(['redirect'=>(Route('mylogincontroller.login'))]);
        }

        error_log("upppppp");
        $file = $request -> file('file-image');
        $current = Carbon::now()->timestamp;
        $fileName = rand().$current.".".$file->getClientOriginalExtension();
        $file->move(public_path('images_upload'), $fileName);
        error_log("upppppp2");
        return response(["pathFile"=>"/images_upload"."/".$fileName], 200);
    }

    public function addPara(Request $request){

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addPara', Part7Paragraph::class)){
            return (Route('mylogincontroller.login'));
        }

        $paraString = $request["doanPart7"];
        $listCauString = $request["listCau"];
        error_log($paraString);
        $paraJson = json_decode($paraString, true);
        try {
            $part7Para = Part7Paragraph::create($paraJson);

            $listCauJson = json_decode($listCauString, true);
            foreach ($listCauJson as $cauJson) {
                $part7Para->cauPart7s()->create($cauJson);
            }

            return "true";
        }catch (Exception $e){
        }
        return "false";
    }

    public function updatePara(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updatePara', Part7Paragraph::class)){
            return (Route('mylogincontroller.login'));
        }

        error_log("update");
        $paraString = $request["doanPart7"];
        $listCauString = $request["listCau"];

        $paraJson = json_decode($paraString, true);
//        error_log(((Object)$paraJson)->id);
        try {
//            $part7Para = new Part7Paragraph($paraJson);
//            $part7Para->update();

            Part7Paragraph::find(((Object)$paraJson)->id)->update($paraJson);

            $listCauJson = json_decode($listCauString, true);
            foreach ($listCauJson as $cauJson) {
                Part7::find(((Object)$cauJson)->id)->update($cauJson);
            }

            return "true";
        }catch (Exception $e){
        }
        return "false";
    }

    public function delPara(Request $request){

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('deletePara', Part7Paragraph::class)){
            return (Route('mylogincontroller.login'));
        }


        $id = $request["id"];
        try {
            $part7Para = Part7Paragraph::find($id);
            foreach ($part7Para->cauPart7s as $cau){
                $part7 = Part7::find($cau->id);
                error_log("aaa");
                error_log($part7->delete());
            }
            foreach ($part7Para->readingParts as $partDoc){
                $partDoc->part7Paragraphs()->detach();
                $partDoc->delete();
            }

            $deleted = $part7Para->delete();
            error_log($deleted);
            if($deleted>0) {
                return 'true';
            }
        }catch (\Exception $e){

        }
        return "false";
    }
}
