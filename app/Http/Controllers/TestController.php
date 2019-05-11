<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\Part1;
use App\Part2;
use App\Part5;
use App\Part6;
use App\Part7;
use App\ConversationParagraph;
use App\ReadingPart;
use App\ListeningPart;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $arrBKT = Test::all();
        return view('user_bkt_home')->with('arrBKT',$arrBKT);
    }

    public function addIndex(Request $request)
    {
        //
        $listPart1 = ListeningPart::where('loaiPart','=','Part 1')->get();
        $sum1 = count($listPart1);

        $listPart2 = ListeningPart::where('loaiPart','=','Part 2')->get();
        $sum2 = count($listPart2);

        $listPart3 = ListeningPart::where('loaiPart','=','Part 3')->get();
        $sum3 = count($listPart3);

        $listPart4 = ListeningPart::where('loaiPart','=','Part 4')->get();
        $sum4 = count($listPart4);

        $listPart5 = ReadingPart::where("loaiPart",'=','Part 5')->get();
        $sum5 = count($listPart5);

        $listPart6 = ReadingPart::where("loaiPart",'=','Part 6')->get();
        $sum6 = count($listPart6);

        $listPart7 = ReadingPart::where("loaiPart",'=','Part 7')->get();
        $sum7 = count($listPart7);

        return view('admin_them_bkt')
                ->with('listPart1',$listPart1)->with('sum1', $sum1)
                ->with('listPart2',$listPart2)->with('sum2', $sum2)
                ->with('listPart3',$listPart3)->with('sum3', $sum3)
                ->with('listPart4',$listPart4)->with('sum4', $sum4)
                ->with('listPart5',$listPart5)->with('sum5', $sum5)
                ->with('listPart6',$listPart6)->with('sum6', $sum6)
                ->with('listPart7',$listPart7)->with('sum7', $sum7);
    }

    public function addTest(Request $request)
    {
        //
        $ids = $request['ids'];
        $title = $request['title'];
        $audio = $request['audio'];


        try{
            $test = new Test();
            $test->accessCount = 0;
            $test->title = $title;
            $test->audio = $audio;

            $test->save();
            $partnghe = array();
            for($i=0; $i<4; $i++){
                array_push($partnghe, $ids[$i]);
            }
            $partdoc = array();
            for($i=4; $i<7; $i++){
                array_push($partdoc, $ids[$i]);
            }
            $test->readingParts()->attach($partdoc);
            $test->listeningParts()->attach($partnghe);
            return "true";
        }
        catch (Exception $e){
        }
        return "false";
    }

    public function doTest(Request $request){
        $id = $request["id"];
        
        $bkt = Test::find($id);
        
        return view('user_bkt_view')->with('bkt', $bkt);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    public function indexUpdate(Request $request){
        $id = $request["id"];
        $bkt = Test::find($id);
        $listPart1 = ListeningPart::where('loaiPart','=','Part 1')->get();

        $listPart2 = ListeningPart::where('loaiPart','=','Part 2')->get();

        $listPart3 = ListeningPart::where('loaiPart','=','Part 3')->get();

        $listPart4 = ListeningPart::where('loaiPart','=','Part 4')->get();

        $listPart5 = ReadingPart::where("loaiPart",'=','Part 5')->get();

        $listPart6 = ReadingPart::where("loaiPart",'=','Part 6')->get();

        $listPart7 = ReadingPart::where("loaiPart",'=','Part 7')->get();

        return view('admin_update_bkt')
            ->with('listPart1',$listPart1)->with('listPart2',$listPart2)
            ->with('listPart3',$listPart3)->with('listPart4',$listPart4)
            ->with('listPart5',$listPart5)->with('listPart6',$listPart6)
            ->with('listPart7',$listPart7)->with("bkt",$bkt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $arrPartDoc = array();
        $arrPartNghe = array();
        $ids = $request["ids"];

        for($i=0;$i<4;$i++){
            array_push($arrPartNghe, $ids[$i]);
        }
        for($i=4;$i<7;$i++){
            array_push($arrPartDoc, $ids[$i]);
        }

        $title = $request["title"];
        $idBKT = $request["idBKT"];
        $audio = $request["audio"];

        try{
            $bkt = Test::find($idBKT);
            $bkt->title=$title;
            $bkt->audio = $audio;
            $bkt->save();
            $bkt->listeningParts()->sync($arrPartNghe);
            $bkt->readingParts()->sync($arrPartDoc);
            return "true";
        }catch (\Exception $e){
        }
        return "false";



    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

    public function indexForAdminHome(){
        $arrBaiHoc = Test::all();
        return View("admin_baihoc_bkt")->with("arrBaiHoc",$arrBaiHoc);
    }

    public function delete(Request $request){
        error_log("asdasd");
//        try{
            $arrTest = Test::findMany($request["arrId"]);
            foreach ($arrTest as $test) {
                $test->readingParts()->detach();
                $test->listeningParts()->detach();
                $test->delete();
            }
            return "true";
//        }catch (\Exception $e){
//
//        }
//        return "false";
    }

    public function searchTesting(Request $request){
        $title = $request["title"];
        $arrTest = array();
        if(strlen($title)==0){
            $arrTest = Test::all();
        }else{
            $arrTest = Test::where("title","like","%".$title."%")->get();
        }
        return Response()->json($arrTest, 200);
    }
}
