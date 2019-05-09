<?php

namespace App\Http\Controllers;


use App\MapPart6Paragraph;
use App\Part6Paragraph;

use App\Part7Paragraph;

use App\ReadingPart;
use Illuminate\Http\Request;
use App\Part5;

class ReadingPartController extends Controller
{


    public function getPartDoc($id){
        $partDoc = ReadingPart::find($id);
        $arrDoan = array();
        $sum = 0;
        if($partDoc->loaiPart == "Part 6"){
            $arrDoan = Part6Paragraph::all();
            $sum = Part6Paragraph::count();
            return view('admin_update_part_6',['partDoc'=>$partDoc,'arrDoan'=>$arrDoan,'sum'=>$sum]);
        }
        else if($partDoc->loaiPart == "Part 7"){
            $partDoc = ReadingPart::find($id);
            $arrDoanDon = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn đơn');
            $arrDoanKep = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn kép');

            $sumDoanDon = Part7Paragraph::where('loaiPart7','=', 'Đoạn đơn')->count();
            $sumDoanKep = Part7Paragraph::where('loaiPart7','=', 'Đoạn kép')->count();

            return view("admin_update_part7")
                ->with("partDoc", $partDoc)
                ->with("arrDoanDon", $arrDoanDon)->with("sumDoanDon", $sumDoanDon)
                ->with("arrDoanKep", $arrDoanKep)->with("sumDoanKep", $sumDoanKep);
        }else if($partDoc->loaiPart == "Part 5"){
            $arrCau = Part5::all();
            $sum = Part5::count();
            return view('admin_update_part5')
                ->with("arrCau",$arrCau)->with("sum",$sum)->with("partDoc", $partDoc);
        }

    }


    public function getListPartDoc(){
        $arrBaiHoc = ReadingPart::all();
        $numBaiHoc = count($arrBaiHoc);
        $numPage = $numBaiHoc /10;
        return view('admin-baihoc-pd',['arrBaiHoc' => $arrBaiHoc,'numBaiHoc'=>$numBaiHoc,'numPage'=>$numPage]);
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
            $data = $request->part;
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

    public function updatePartDoc(Request $request){
        error_log('id'.$request['id']);
    }



    public function practicePartDoc($id)
    {
        $partDoc = ReadingPart::find($id);
        if($partDoc->loaiPart == "Part 6"){
            return view("part6", ['partDoc' => $partDoc]);
        }else if($partDoc->loaiPart == "Part 7"){
            return view("part7", ['partDoc' => $partDoc]);
        }else if($partDoc->loaiPart == "Part 5"){
           return view("guest_part5_view", ['partDoc' => $partDoc]);
        }

    }

    public function getPart7(Request $request){
//       $arrDoanDon = Part7Paragraph::where('loaiPart7','=', 'Đoạn đơn')->offset(0)->limit(20)->get();
//       $arrDoanKep = Part7Paragraph::where('loaiPart7','=', 'Đoạn kép')->offset(0)->limit(20)->get();
        $arrDoanDon = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn đơn');
        $arrDoanKep = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn kép');

       $sumDoanDon = Part7Paragraph::where('loaiPart7','=', 'Đoạn đơn')->count();
       $sumDoanKep = Part7Paragraph::where('loaiPart7','=', 'Đoạn kép')->count();

       return view("add_part_7")
           ->with("arrDoanDon", $arrDoanDon)->with("sumDoanDon", $sumDoanDon)
           ->with("arrDoanKep", $arrDoanKep)->with("sumDoanKep", $sumDoanKep);
   }

   public function addPart7(Request $request){
       $part7String = $request["part7"];
       $listDoanString = $request["listDoanVan"];

       $part7Json = json_decode($part7String, true);
       $listDoanJson = json_decode($listDoanString, true);
       try {
           $part7 = ReadingPart::create($part7Json);
           foreach ($listDoanJson as $doanJson) {
               $part7->part7Paragraphs()->attach(((Object) $doanJson)->id);
           }
           return "true";
       }catch (Exception $e){
       }
       return "false";
   }

   public function indexUpdatePart7(Request $request)
   {
       $id = $request["id"];
       $partDoc = ReadingPart::find($id);
       $arrDoanDon = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn đơn');
       $arrDoanKep = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn kép');

       $sumDoanDon = Part7Paragraph::where('loaiPart7','=', 'Đoạn đơn')->count();
       $sumDoanKep = Part7Paragraph::where('loaiPart7','=', 'Đoạn kép')->count();

       return view("admin_update_part7")
           ->with("partDoc", $partDoc)
           ->with("arrDoanDon", $arrDoanDon)->with("sumDoanDon", $sumDoanDon)
           ->with("arrDoanKep", $arrDoanKep)->with("sumDoanKep", $sumDoanKep);
   }

   public function updatePart7(Request $request){
       $arrId = array();

       $part7String = $request["part7"];
       error_log($part7String);
       $listDoanPart7String = $request["listDoanPart7"];

       $part7Json = json_decode($part7String, true);
       $listDoanPart7Json = json_decode($listDoanPart7String, true);

       for ($i=0;$i<count($listDoanPart7Json);$i++){
           array_push($arrId, ((Object) $listDoanPart7Json[$i])->id);
       }

       try {
           $part7 = ReadingPart::find(((Object)$part7Json)->id);
           $part7->title= ((Object)$part7Json)->title;
           $part7->save();
           $part7->part7Paragraphs()->sync($arrId);

           return "true";
       }catch (Exception $e){
       }
       return "false";
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAddPart5()
    {
        //
        // $arrCau = Part5::offset(0)->limit(20)->get();
        $arrCau = Part5::all();
        $sum = Part5::count();
        return view('admin_them_part5')
            ->with("arrCau",$arrCau)->with("sum",$sum);
    }

    public function addPart5(Request $request){
        $paraString = $request["partDoc"];
        $listCauString = $request["listCauPart5"];
        
        $paraJson = json_decode($paraString, true);
        try {
            $partdoc = ReadingPart::create($paraJson);
            
            $listCauJson = json_decode($listCauString, true);
            foreach ($listCauJson as $cauJson) {
                $partdoc->cauPart5s()->attach(((Object)$cauJson)->id);
            }
            return "true";
        }catch (Exception $e){
        }
        return "false";
    }

    public function indexUpdatePart5(Request $request)
    {
        //
        // $arrCau = Part5::offset(0)->limit(20)->get();
        $arrCau = Part5::all();
        $sum = Part5::count();
        $partDoc = ReadingPart::find($request["id"]);
        return view('admin_update_part5')
            ->with("arrCau",$arrCau)->with("sum",$sum)->with("partDoc", $partDoc);
    }

    public function updatePart5(Request $request){
        $paraString = $request["partDoc"];
        $listCauString = $request["listCauPart5"];
        
        $paraJson = json_decode($paraString, true);
        try {
            error_log(((Object)$paraJson)->id);
            $partdoc = ReadingPart::find(((Object)$paraJson)->id);
            $title = ((Object)$paraJson)->title;
            $partdoc->title = $title;
            $partdoc->save();
            $listCauJson = json_decode($listCauString, true);
            $arrID = array();
            foreach ($listCauJson as $cauJson) {
                array_push($arrID,((Object)$cauJson)->id);
            }
            $partdoc->cauPart5s()->sync($arrID);
            return "true";
        }catch (Exception $e){
        }
        return "false";
    }




    public function indexGuestPart5(Request $request)
    {
        //
        // $arrCau = Part5::offset(0)->limit(20)->get();
        $partDoc = ReadingPart::find($request["id"]);
        return view('guest_part5_view')
            ->with("partDoc", $partDoc);
    }
}
