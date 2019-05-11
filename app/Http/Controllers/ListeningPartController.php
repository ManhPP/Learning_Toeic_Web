<?php

namespace App\Http\Controllers;

use App\ListeningPart;
use App\ConversationParagraph;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;

class ListeningPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arrPN = ListeningPart::all();
        return view('guest_luyennghe_home')->with("arrPN",$arrPN);
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

    //upload ảnh lên server
    public function uploadimage(Request $request){
        try{
        $file = $request->file("file-image");
         $fileName = time().'.'.$file->getClientOriginalExtension();
         $des=public_path('/images_upload');
         $file->move($des,$fileName);
         return response()->json(["pathFile"=>"images_upload"."/".$fileName], 200);
        }catch(Exception $e){

        }
        return false;

    }

    //updload audio lên server
    public function uploadaudio(Request $request){
        error_log("a");
        try{
            $file = $request->file("audio");
            // $size=$request->file('audio')->getSize();
            // error_log($size);
            // error_log();
            $fileName = time().'.'.$file->getClientOriginalExtension();
            error_log($fileName);
            $des=public_path('/audio_upload');
            $file->move($des,$fileName);
            return response()->json(["pathFile"=>"audio_upload"."/".$fileName], 200);
        }catch(Exception $e){

        }
        return false;
    }


//    public function indexGuestPart1(Request $request){
//        $partNghe = ListeningPart::find($request["id"]);
//        return view("guest_part1_view")->with("partNghe", $partNghe);
//    }
//
//    public function indexGuestPart2(Request $request){
//        $partNghe = ListeningPart::find($request["id"]);
//        return view("guest_part2_view")->with("partNghe", $partNghe);
//    }
//
//    public function indexGuestPart3(Request $request){
//        $partNghe = ListeningPart::find($request["id"]);
//        return view("guest_part3_view")->with("partNghe", $partNghe);
//    }
//    public function indexGuestPart4(Request $request){
//        $partNghe = ListeningPart::find($request["id"]);
//        return view("guest_part4_view")->with("partNghe", $partNghe);
//    }

    public function practicePartNghe(Request $request)
    {
        $id = $request["id"];
        $partNghe = ListeningPart::find($id);
        if($partNghe->loaiPart == "Part 1"){
            return view("guest_part1_view", ['partNghe' => $partNghe]);
        }else if($partNghe->loaiPart == "Part 7"){
            return view("guest_part2_view", ['partNghe' => $partNghe]);
        }else if($partNghe->loaiPart == "Part 5"){
            return view("guest_part3_view", ['partNghe' => $partNghe]);
        }else{
            return view("guest_part4_view")->with("partNghe", $partNghe);
        }

    }

    //lấy dữ liệu cho view admin quản lý phần nghe
    public function get(Request $request){
        $arrBaiHoc=ListeningPart::all();
        $numBaiHoc=$arrBaiHoc->count();
        return view('admin_baihoc_pn')->with("arrBaiHoc",$arrBaiHoc)->with("numBaiHoc",$numBaiHoc);
    }

    //return view udpate các part phần nghe
    public function redirectViewUpdate($id){
        $listeningPart=ListeningPart::find($id);
        if($listeningPart->loaiPart=="Part 1"){
            $part1=$listeningPart;
            return view('update_part_1')->with("part1", $part1);
        }else if($listeningPart->loaiPart=="Part 2"){
            $part2=$listeningPart;
            return view('update_part_2')->with("part2",$part2);
        }else if($listeningPart->loaiPart=="Part 3"){
            $part3=$listeningPart;
            return view('update_part_3')->with("partNghe",$part3);
        }
        else if($listeningPart->loaiPart=="Part 4"){
            $part4=$listeningPart;
            return view('update_part_4')->with("partNghe",$part4);
        }
    }

    //return view  các part phần nghe
    public function redirectView($id){
        $listeningPart=ListeningPart::find($id);
        if($listeningPart->loaiPart=="Part 1"){
            $partNghe=$listeningPart;
            return view("guest_part1_view")->with("partNghe", $partNghe);
        }else if($listeningPart->loaiPart=="Part 2"){
            $partNghe=$listeningPart;
            return view("guest_part2_view")->with("partNghe", $partNghe);
        }else if($listeningPart->loaiPart=="Part 3"){
            $partNghe=$listeningPart;
            return view("guest_part3_view")->with("partNghe", $partNghe);
        }
        else if($listeningPart->loaiPart=="Part 4"){
            $partNghe=$listeningPart;
            return view("guest_part4_view")->with("partNghe", $partNghe);
        }
    }

    // xóa part nghe
    public function delete(Request $request){
        $arrID = $request["arrId"];
        \Log::info($arrID);
        foreach($arrID as $id){
            $check=$this->deletePart($id);
            if($check==0) return 0;
        }
        return 1;
    }

    // hàm con xử lý xóa
    public function deletePart($id){
        $listeningPart=ListeningPart::find($id);
        if($listeningPart->loaiPart=="Part 1"){
            $listeningPart->part1()->delete();

        }else if($listeningPart->loaiPart=="Part 2"){
            $listeningPart->part2()->delete();

        }else if($listeningPart->loaiPart=="Part 3"){
            $arrDoanHTmodel=ConversationParagraph::where('idPartNghe',$id)->get();
                foreach($arrDoanHTmodel as $doanHTmodel){
                    $doanHTmodel->conversationSentence()->delete();
                   $doanHTmodel->delete();
                }
        }
        else if($listeningPart->loaiPart=="Part 4"){
            $arrDoanHTmodel=ConversationParagraph::where('idPartNghe',$id)->get();
            foreach($arrDoanHTmodel as $doanHTmodel){
                $doanHTmodel->conversationSentence()->delete();
               $doanHTmodel->delete();
            }
        }
        return $listeningPart->delete();
    }

    public function searchListening(Request $request){
        $title = $request["title"];
        $part = $request["loaiPart"];

        $arrTest = array();
        if(strlen($title)==0 && $part==0){
            $arrTest = ListeningPart::all();
        }
        elseif(strlen($title)!=0 && $part == 0){
            $arrTest = ListeningPart::where("title","like","%".$title."%")->get();
        }
        elseif(strlen($title)==0 && $part != 0){
            $arrTest = ListeningPart::where("loaiPart","like","%Part ".$part."%")->get();
        }
        else{
            $arrTest = ListeningPart::where("loaiPart","like","%Part ".$part."%","and","title","like","%".$title."%")->get();
        }
        return Response()->json($arrTest, 200);
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
     * @param  \App\ListeningPart  $listeningPart
     * @return \Illuminate\Http\Response
     */
    public function show(ListeningPart $listeningPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListeningPart  $listeningPart
     * @return \Illuminate\Http\Response
     */
    public function edit(ListeningPart $listeningPart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListeningPart  $listeningPart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListeningPart $listeningPart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListeningPart  $listeningPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListeningPart $listeningPart)
    {
        //
    }
}
