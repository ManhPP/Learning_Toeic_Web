<?php

namespace App\Http\Controllers;

use App\Part7Paragraph;
use App\ReadingPart;
use Illuminate\Http\Request;
use App\Part5;
use PhpParser\Node\Expr\Cast\Object_;

class ReadingPartController extends Controller
{
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
