<?php

namespace App\Http\Controllers;

use App\Part6;
use App\Part6Paragraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        try{
            $para=$request["para"];
            error_log($para);
            // convert to model paraPart6
            $json = json_decode($para);

            $part6Para = new Part6Paragraph();
            $saved = $part6Para->save();
            if($saved){
                foreach ($json->listCauPart6 as $cau){
                    $part6 = new Part6();
                    $part6->idDoan      = Part6Paragraph::max('id');
                    $part6->cauHoi  = $cau->cauHoi;
                    $part6->daA     = $cau->daA;
                    $part6->daB     = $cau->daB;
                    $part6->daC     = $cau->daC;
                    $part6->daD     = $cau->daD;
                    $part6->daDung  = $cau->daDung;
                    $part6->save();
                }
                return Part6Paragraph::max('id');
            }else{
                $part6Para->delete();
            }
        }catch(\Exception $e){
            error_log($e->getMessage());
        }

        return 'false';

    }

    public function update(Request $request){
        try{
            $para=$request["para"];
            error_log($para);
            // convert to model paraPart6
            $obj = json_decode($para);

            $part6Para = Part6Paragraph::find($obj->id);

            foreach ($obj->listCauPart6 as $cau){
                    $part6 =Part6::find($cau->id);
                    $part6->idDoan  = $part6Para->id;
                    $part6->cauHoi  = $cau->cauHoi;
                    $part6->daA     = $cau->daA;
                    $part6->daB     = $cau->daB;
                    $part6->daC     = $cau->daC;
                    $part6->daD     = $cau->daD;
                    $part6->daDung  = $cau->daDung;
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
        try{
            $id = $request->id;
            $part6Para = Part6Paragraph::find($id);

            foreach ($part6Para->part6 as $cau){
                $part6 = Part6::find($cau->id);
                $part6->delete();
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
