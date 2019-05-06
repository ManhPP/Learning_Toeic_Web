<?php

namespace App\Http\Controllers;

use App\Part5;
use Illuminate\Http\Request;

class Part5Controller extends Controller
{
    public function index(Request $request){
        //        $i=0;
        $arrCau = Part5::offset(0)->limit(20)->get();
//        foreach ($arrDoan[0]->cauPart7s as $cauPart7) {
//            error_log($i);
//            $i++;
//        }
        $sum = Part5::count();
        return view('admin_manager_cau_part5')
            ->with("arrCau", $arrCau)->with("sum", $sum);
    }

    public function add(Request $request){
        $cauHoi = $request['cauHoi'];
        $daA = $request['daA'];
        $daB = $request['daB'];
        $daC = $request['daC'];
        $daD = $request['daD'];
        $dADung = $request['daDung'];
        error_log('hrhr');
        return response()->json(["2"=>"w"],200);
    }
}
