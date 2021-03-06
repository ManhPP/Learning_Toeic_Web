<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\ListeningPart;
use App\ConversationParagraph;
use App\Report;
use Auth;
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
        $userLogin = Auth::guard("accounts")->user();
        return view('guest_luyennghe_home')
            ->with("arrPN",$arrPN)->with("userLogin", $userLogin);
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
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addListening', ListeningPart::class)){
            return response()->json(['redirect'=>( Route('mylogincontroller.login'))]);
        }
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
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('addListening', ListeningPart::class)){
            return response()->json(['redirect'=>(Route('mylogincontroller.login'))]);
        }
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


    public function practicePartNghe(Request $request)
    {
        $id = $request["id"];
        $partNghe = ListeningPart::find($id);

        $userLogin = Auth::guard("accounts")->user();

        $view = $partNghe->acessCount;
        $partNghe->acessCount = $view +1;
        $partNghe->save();
        if($partNghe->loaiPart == "Part 1"){
            return view("guest_part1_view", ['partNghe' => $partNghe, 'userLogin'=>$userLogin]);
        }else if($partNghe->loaiPart == "Part 2"){
            return view("guest_part2_view", ['partNghe' => $partNghe, 'userLogin'=>$userLogin]);
        }else if($partNghe->loaiPart == "Part 3"){
            return view("guest_part3_view", ['partNghe' => $partNghe, 'userLogin'=>$userLogin]);
        }else{
            return view("guest_part4_view")->with("partNghe", $partNghe)->with('userLogin',$userLogin);
        }

    }

    //lấy dữ liệu cho view admin quản lý phần nghe
    public function get(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('manage', ListeningPart::class)){
            return redirect(Route('mylogincontroller.login'));
        }
        $listReport = Report::where('isProcessed', '=', '0')->get();
        $arrBaiHoc=ListeningPart::all();
        $numBaiHoc=$arrBaiHoc->count();
        return view('admin_baihoc_pn')->with("arrBaiHoc",$arrBaiHoc)->with('listReport', $listReport)->with("numBaiHoc",$numBaiHoc);
    }

    //return view udpate các part phần nghe
    public function redirectViewUpdate($id){

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('updateListening', ListeningPart::class)){
            return redirect(Route('mylogincontroller.login'));
        }

        $listeningPart=ListeningPart::find($id);

        $userLogin = Auth::guard("accounts")->user();

        if($listeningPart->loaiPart=="Part 1"){
            $part1=$listeningPart;
            return view('update_part_1')->with("part1", $part1)->with('userLogin', $userLogin);
        }else if($listeningPart->loaiPart=="Part 2"){
            $part2=$listeningPart;
            return view('update_part_2')->with("part2",$part2)->with('userLogin', $userLogin);
        }else if($listeningPart->loaiPart=="Part 3"){
            $part3=$listeningPart;
            return view('update_part_3')->with("partNghe",$part3)->with('userLogin', $userLogin);
        }
        else if($listeningPart->loaiPart=="Part 4"){
            $part4=$listeningPart;
            return view('update_part_4')->with("partNghe",$part4)->with('userLogin', $userLogin);
        }
    }

    // return view  các part phần nghe
    public function redirectView($id){
        $listeningPart=ListeningPart::find($id);
        $view = $listeningPart->acessCount;
        $listeningPart->acessCount = $view +1;
        $listeningPart->save();
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

        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('deleteListening', ListeningPart::class)){
            return (Route('mylogincontroller.login'));
        }

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

        foreach($listeningPart->tests as $ts){
            $ts->listeningParts()->detach();
            $ts->readingParts()->detach();
            $ts->delete();
        }

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

    public function indexAddPart1(){
        $userLogin = Auth::guard("accounts")->user();
        return view('add_part_1_new')->with('userLogin',$userLogin);
    }
    public function indexAddPart2(){
        $userLogin = Auth::guard("accounts")->user();
        return view('add_part_2')->with('userLogin',$userLogin);
    }
    public function indexAddPart3(){
        $userLogin = Auth::guard("accounts")->user();
        return view('add_part_3')->with('userLogin',$userLogin);
    }
    public function indexAddPart4(){
        $userLogin = Auth::guard("accounts")->user();
        return view('add_part_3')->with('userLogin',$userLogin);
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
