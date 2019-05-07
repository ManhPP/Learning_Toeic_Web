<?php

namespace App\Http\Controllers;

use App\ReadingPart;
use Illuminate\Http\Request;
use App\Part5;
use PhpParser\Node\Expr\Cast\Object_;

class ReadingPartController extends Controller
{
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
