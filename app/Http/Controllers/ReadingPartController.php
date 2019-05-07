<?php

namespace App\Http\Controllers;

use App\MapPart6Paragraph;
use App\Part6Paragraph;
use App\ReadingPart;
use Illuminate\Http\Request;

class ReadingPartController extends Controller
{

    public function getPart6($id){
        $partDoc = ReadingPart::find($id);
        $arrDoan = Part6Paragraph::all();
        $sum = Part6Paragraph::count();
        return view('update_part_6',['partDoc'=>$partDoc,'arrDoan'=>$arrDoan,'sum'=>$sum]);
    }

    public function addPart6(Request $request){
        try{
            //parse string to part6
            $part6 = json_decode($request->part6);

            $addPart6 = new ReadingPart();
            $addPart6->loaiPart = $part6->loaiPart;
            $addPart6->title = $part6->tittle;
            $addPart6->accessCount = 0;
            $row = $addPart6->save();
            if($row>0){
                foreach ($part6->listDoanVanPart6 as $doanPart6){
                    $mapPart6Paragraph = new MapPart6Paragraph();
                    $mapPart6Paragraph->idDoanVan = $doanPart6->id;
                    $mapPart6Paragraph->idPartDoc = ReadingPart::max('id');
                    $mapPart6Paragraph->save();
                }
            }
            return 'true';
        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return 'false';
    }

    public function updatePart6(Request $request){
        try{
            $data = $request->part6;
            $partDoc_Obj = json_decode($data);
            $partDoc = ReadingPart::find($partDoc_Obj->id);
            $partDoc->title = $partDoc_Obj->tittle;

            $arrId = array();
            foreach ($partDoc_Obj->listDoanVanPart6 as $doanvan){
                array_push($arrId ,$doanvan->id);
            }

            $partDoc->part6Paragraphs()->sync($arrId);
            $partDoc->save();
            return 'true';
        }catch(\Exception $ex){
            error_log($ex->getMessage());
        }
        return 'false';
    }
    public function practicePart6($id){
        $part6 = ReadingPart::find($id);
        return view("part6",['partDoc'=>$part6]);
    }
    public function practicePart7($id){
        $part7 = ReadingPart::find($id);
        return view("part7",['partDoc'=>$part7]);

    }
}
