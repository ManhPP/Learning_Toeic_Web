<?php

namespace App\Http\Controllers;

use App\Part7;
use App\Part7Paragraph;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PhpParser\Node\Expr\Cast\Object_;

class Part7ParagraphController extends Controller
{


    public function getPart7Paragraph(Request $request){
//        $i=0;
//        $arrDoan = Part7Paragraph::offset(0)->limit(20)->get();
        $arrDoan = Part7Paragraph::all();
        $sum = Part7Paragraph::count();
        return view('manager_para_part7')
            ->with("arrDoan", $arrDoan)->with("sum", $sum);
    }

    public function uploadFile(Request $request){
        error_log("upppppp");
        $file = $request -> file('file-image');
        $current = Carbon::now()->timestamp;
        $fileName = rand().$current.".".$file->getClientOriginalExtension();
        $file->move(public_path('images_upload'), $fileName);
        error_log("upppppp2");
        return response(["pathFile"=>"/images_upload"."/".$fileName], 200);
    }

    public function addPara(Request $request){
        $paraString = $request["doanPart7"];
        $listCauString = $request["listCau"];
        error_log($paraString);
        $paraJson = json_decode($paraString, true);
//        try {
            $part7Para = Part7Paragraph::create($paraJson);

            $listCauJson = json_decode($listCauString, true);
            foreach ($listCauJson as $cauJson) {
                $part7Para->cauPart7s()->create($cauJson);
            }

            return "true";
//        }catch (Exception $e){
//        }
//        return "false";
    }

    public function updatePara(Request $request){
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
        $id = $request["id"];
        try {
            $part7Para = Part7Paragraph::find($id);
            $part7Para->cauPart7s()->delete();
            $part7Para->delete();
            return "true";
        }catch (\Exception $e){

        }
        return "false";
    }
}
