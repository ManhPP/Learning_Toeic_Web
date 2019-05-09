<?php

namespace App\Http\Controllers;

use App\Part6;
use App\Part6Paragraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Scalar\String_;

class Part6ParagraphController extends Controller
{

    public function listPart6(){
        $data = Part6Paragraph::all();
        $sum = Part6Paragraph::count();
        return view('add_part_6',['arrDoan'=>$data,'sum'=>$sum]);
    }

    public function listPart6Para(){
        $data = Part6Paragraph::all();
        $sum = Part6Paragraph::count();
        return view('add_part6_paragraph',['arrDoan'=>$data,'sum'=>$sum]);
    }

    public function add(Request $request){

            $para=$request["para"];
            error_log($para);
            // convert to model paraPart6
            $json = json_decode($para,true);

            $part6Para = new Part6Paragraph();
        try{
            $check=$part6Para->save();
            error_log("a");
            if($check > 0)
            {
                foreach (((Object)$json)->listCauPart6 as $jsonCau){
                    $part6Para->part6()->create($jsonCau);
                }
            }
            return Part6Paragraph::max('id');
        }catch(\Exception $e){
            error_log("error".$e->getMessage());
        }

        return 'false';

    }

    public function update(Request $request){
//        try{
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

//        }catch(\Exception $ex){
//            error_log($ex->getMessage());
//        }
        return 'false';
    }

    public function delete(Request $request){
        try{
            $id = $request->id;
            $part6Para = Part6Paragraph::find($id);
            error_log("request ".$request->id);
            foreach ($part6Para->part6 as $cau){
                $part6 = Part6::find($cau->id);
                error_log($part6->delete());
            }
            error_log("ASDASD");
            error_log("".count($part6Para->readingPart()));
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
