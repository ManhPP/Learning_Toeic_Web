<?php

namespace App\Http\Controllers;


use App\Discussion;
use App\MapPart6Paragraph;
use App\Part6Paragraph;

use App\Part7Paragraph;

use App\ReadingPart;
use App\Report;
use Auth;
use Illuminate\Http\Request;
use App\Part5;

class ReadingPartController extends Controller
{

    public function index(){
        $arrPD = ReadingPart::all();
        $userLogin = Auth::guard("accounts")->user();
        return view('guest_luyendoc_home')
            ->with("arrPD", $arrPD)->with("userLogin",$userLogin);
    }

    //index update part doc
    public function getPartDoc(Request $request){

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updateReading', ReadingPart::class)){
            return redirect(Route('mylogincontroller.login'));
        }


        $id = $request["id"];
        $partDoc = ReadingPart::find($id);
        $arrDoan = array();
        $sum = 0;

        if($partDoc->loaiPart == "Part 6"){
            $arrDoan = Part6Paragraph::all();
            $sum = Part6Paragraph::count();
            return view('admin_update_part_6',['partDoc'=>$partDoc,'arrDoan'=>$arrDoan,'sum'=>$sum, 'userLogin'=>$userLogin]);
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
                ->with("arrDoanKep", $arrDoanKep)->with("sumDoanKep", $sumDoanKep)
                ->with('userLogin', $userLogin);
        }else if($partDoc->loaiPart == "Part 5"){
            $arrCau = Part5::all();
            $sum = Part5::count();
            return view('admin_update_part5')
                ->with("arrCau",$arrCau)->with("sum",$sum)->with("partDoc", $partDoc)
                ->with('userLogin', $userLogin);

        }

    }


    public function getListPartDoc(){


        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('manage', ReadingPart::class)){
            return redirect(Route('mylogincontroller.login'));
        }
        $listReport = Report::where('isProcessed', '=', '0')->get();

        $arrBaiHoc = ReadingPart::all();
        $numBaiHoc = count($arrBaiHoc);
        $numPage = round($numBaiHoc / 10,0,PHP_ROUND_HALF_DOWN)+1;
        return view('admin-baihoc-pd',['arrBaiHoc' => $arrBaiHoc,'numBaiHoc'=>$numBaiHoc,'numPage'=>$numPage, 'listReport'=>$listReport]);
    }

    public function delPartDoc(Request $request)
    {
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('deleteReading', ReadingPart::class)){
            return (Route('mylogincontroller.login'));
        }


        $arrId = $request->arrId;
        foreach ($arrId as $id) {
            $checked = $this->delPhanDoc($id);
            if(!$checked){
                return 'false';
            }
        }
        return 'true';
    }

    //su dung moi khi muon xoa partDoc rieng
    public function delPhanDoc($id){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('deleteReading', ReadingPart::class)){
            return (Route('mylogincontroller.login'));
        }

        $partDoc = ReadingPart::find($id);

        if($partDoc->loaiPart == "Part 6"){
            $partDoc->part6Paragraphs()->detach();
        }else if($partDoc->loaiPart == "Part 7"){
            $partDoc->part7Paragraphs()->detach();
        }else if($partDoc->loaiPart == "Part 5"){
            $partDoc->cauPart5s()->detach();
        }
        $deleted = $partDoc->delete();
        return $deleted;
    }

    public function addPart6(Request $request){


        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addReading', ReadingPart::class)){
            return (Route('mylogincontroller.login'));
        }


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


        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updateReading', ReadingPart::class)){
            return (Route('mylogincontroller.login'));
        }

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



    public function practicePartDoc(Request $request)
    {
        $id = $request["id"];
        error_log($id);
        $partDoc = ReadingPart::find($id);
        $view = $partDoc->accessCount;
        $partDoc->accessCount = $view +1;
        $partDoc->save();
        $userLogin = Auth::guard("accounts")->user();

        if($partDoc->loaiPart == "Part 6"){
            return view("part6", ['partDoc' => $partDoc, 'userLogin'=>$userLogin]);
        }else if($partDoc->loaiPart == "Part 7"){
            return view("part7", ['partDoc' => $partDoc, 'userLogin'=>$userLogin]);
        }else if($partDoc->loaiPart == "Part 5"){
           return view("guest_part5_view", ['partDoc' => $partDoc, 'userLogin'=>$userLogin]);
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


       $userLogin = Auth::guard("accounts")->user();
       if( $userLogin==null || !$userLogin->can('addReading', ReadingPart::class)){
           return (Route('mylogincontroller.login'));
       }


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
       $userLogin = Auth::guard("accounts")->user();
       if( $userLogin==null || !$userLogin->can('manage', ReadingPart::class)){
           return redirect(Route('mylogincontroller.login'));
       }


       $id = $request["id"];
       $partDoc = ReadingPart::find($id);
       $arrDoanDon = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn đơn');
       $arrDoanKep = Part7Paragraph::all()->where('loaiPart7','=', 'Đoạn kép');

       $sumDoanDon = Part7Paragraph::where('loaiPart7','=', 'Đoạn đơn')->count();
       $sumDoanKep = Part7Paragraph::where('loaiPart7','=', 'Đoạn kép')->count();

       $userLogin = Auth::guard("accounts")->user();

       return view("admin_update_part7")
           ->with("partDoc", $partDoc)
           ->with("arrDoanDon", $arrDoanDon)->with("sumDoanDon", $sumDoanDon)
           ->with("arrDoanKep", $arrDoanKep)->with("sumDoanKep", $sumDoanKep)
           ->with('userLogin', $userLogin);
   }

   public function updatePart7(Request $request){

       $userLogin = Auth::guard("accounts")->user();
       if( $userLogin==null || !$userLogin->can('updateReading', ReadingPart::class)){
           return (Route('mylogincontroller.login'));
       }


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

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addReading', ReadingPart::class)){
            return redirect(Route('mylogincontroller.login'));
        }


        $arrCau = Part5::all();
        $sum = Part5::count();


        return view('admin_them_part5')
            ->with("arrCau",$arrCau)->with("sum",$sum)->with('userLogin', $userLogin);
    }

    public function addPart5(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addReading', ReadingPart::class)){
            return (Route('mylogincontroller.login'));
        }


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
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updateReading', ReadingPart::class)){
            return redirect(Route('mylogincontroller.login'));
        }


        $arrCau = Part5::all();
        $sum = Part5::count();
        $partDoc = ReadingPart::find($request["id"]);
        return view('admin_update_part5')
            ->with("arrCau",$arrCau)->with("sum",$sum)->with("partDoc", $partDoc)->with('userLogin', $userLogin);
    }

    public function updatePart5(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updateReading', ReadingPart::class)){
            return (Route('mylogincontroller.login'));
        }


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





//    public function indexGuestPart5(Request $request)
//    {
//        //
//        // $arrCau = Part5::offset(0)->limit(20)->get();
//        $partDoc = ReadingPart::find($request["id"]);
//        return view('guest_part5_view')
//            ->with("partDoc", $partDoc);
//    }


    public function searchReading(Request $request){
        $title = $request["title"];
        $part = $request["loaiPart"];

        $arrTest = array();
        if(strlen($title)==0 && $part==0){
            $arrTest = ReadingPart::all();
        }
        elseif(strlen($title)!=0 && $part == 0){
            $arrTest = ReadingPart::where("title","like","%".$title."%")->get();
        }
        elseif(strlen($title)==0 && $part != 0){
            $arrTest = ReadingPart::where("loaiPart","like","%Part ".$part."%")->get();
        }
        else{
            $arrTest = ReadingPart::where("loaiPart","like","%Part ".$part."%","and","title","like","%".$title."%")->get();
        }
        return Response()->json($arrTest, 200);
    }

    public function doPractice(Request $request){
        $id = $request["id"];
        $userLogin = Auth::guard("accounts")->user();
        $bkt = ReadingPart::find($id);
        
        return view('user_bkt_view')
            ->with('bkt', $bkt)->with("userLogin",$userLogin);
    }
}
