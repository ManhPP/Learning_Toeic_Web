<?php

namespace App\Http\Controllers;

use App\Part5;
use Auth;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class Part5Controller extends Controller
{
    public function index(Request $request){
        //        $i=0;
        $arrCau = Part5::all();
        $userLogin = Auth::guard("accounts")->user();
        $sum = Part5::count();
        return view('admin_manager_cau_part5')
            ->with("arrCau", $arrCau)->with("sum", $sum)
            ->with('userLogin', $userLogin);
    }

    public function add(Request $request){
        $cauHoi = $request['cauHoi'];
        $daA = $request['daA'];
        $daB = $request['daB'];
        $daC = $request['daC'];
        $daD = $request['daD'];
        $dADung = $request['daDung'];
        
        $part5 = new Part5();
        $part5->cauHoi = $cauHoi;
        $part5->daA = $daA;
        $part5->daB = $daB;
        $part5->daC = $daC;
        $part5->daD = $daD;
        $part5->dADung = $dADung;
        try{
            $part5 ->save();
            return response()->json(["id"=>$part5->id],200);
        }
        catch(Exception $e){
            
        }
        return response()->json(["id"=>-1],200);
    }

    public function update(Request $request){
        $cauHoi = $request['cauHoi'];
        $id = $request['id'];
        $daA = $request['daA'];
        $daB = $request['daB'];
        $daC = $request['daC'];
        $daD = $request['daD'];
        $dADung = $request['daDung'];
        
        $part5 = new Part5();

        $part5->id = $id;
        $part5->cauHoi = $cauHoi;
        $part5->daA = $daA;
        $part5->daB = $daB;
        $part5->daC = $daC;
        $part5->daD = $daD;
        $part5->dADung = $dADung;
        try{
            Part5::find($id)->update($part5->toArray());
            return response()->json(["id"=>$part5->id],200);
        }
        catch(Exception $e){
            
        }
        return response()->json(["id"=>-1],200);
    }

    public function delete(Request $request){
        $id = $request['id'];

        try{
            Part5::find($id)->delete();
            return "true";
        }
        catch(Exception $e){
            
        }
        return "false";
    }
}
