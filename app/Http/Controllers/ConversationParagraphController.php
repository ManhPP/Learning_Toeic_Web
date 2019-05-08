<?php

namespace App\Http\Controllers;

use App\ConversationParagraph;
use App\ListeningPart;
use Illuminate\Http\Request;
use App\ConversationSentence;

class ConversationParagraphController extends Controller
{
    public function createCPPart3(Request $request)
    {

        $listeningPart = $request["part3"];

        $listHoiThoai = $request["listHoiThoai"];
        $arrListCau = $request["arrListCau"];

        $paraJson = json_decode($listeningPart, true);
        $listeningPart = ListeningPart::create($paraJson);

        $listHoiThoaiJson = json_decode($listHoiThoai, true);
        $arrListCauJson = json_decode($arrListCau, true);

        $i=0;
        foreach ($listHoiThoaiJson as $doanHoiThoai) {
            $doanHTmodel = $listeningPart->conversation_paragraph()->create($doanHoiThoai);
            
                foreach ($arrListCauJson[$i] as $cauPart3) {
                    $doanHTmodel->conversationSentence()->create($cauPart3);
                }
            $i++;
        }
        
        return Response($paraJson, 200);
    }

    public function getPart3(Request $request)
    {
        // $idPartNghe=$request["id"];
        $part3 = ListeningPart::find(41);
        // print_r("1111");
        return view('update_part_3')
            ->with("partNghe", $part3);
    }

    public function updatePart3(Request $request)
    {
        $listeningPart = $request["part3"];
        \Log::info($listeningPart);
        $listHoiThoai = $request["listHoiThoai"];
        $arrListCau = $request["arrListCau"];


        $paraJson = json_decode($listeningPart, true);
        $listHoiThoaiJson = json_decode($listHoiThoai, true);
        $arrListCauJson = json_decode($arrListCau, true);
        \Log::info($arrListCauJson[1]);

        try {

            ListeningPart::find(((Object)$paraJson)->id)->update($paraJson);

            $i=0;
            foreach ($listHoiThoaiJson as $doanHoiThoai) {
                ConversationParagraph::find(((Object)$doanHoiThoai)->id)->update($doanHoiThoai);
                    foreach ($arrListCauJson[$i] as $cauPart3) {
                        \Log::info(3);
                        ConversationSentence::find(((Object)$cauPart3)->id)->update($cauPart3);
                    }
                $i++;
            }
            return 1;
        } catch (Exception $e) { }
        return 2;
    }

    public function deletePart3(Request $request){
        // $id = $request["id"];
        try {
            $part3 = ListeningPart::find(41);
            
            $doanHTmodel=ConversationParagraph::where('idPartNghe',41)->get();
                \Log::info($doanHTmodel);
                foreach($doanHTmodel->conversationSentence as $cau){
                    \Log::info($cau);
                    $cauPart3=ConversationSentence::find($cau->id);
                    \Log::info($cauPart3);
                    $cauPart3->delete();
                }
                $doanHTmodel->delete();
                $part3->delete();
            
    
            return 1;
        }catch (\Exception $e){

        }
        return 2;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\ConversationParagraph  $conversationParagraph
     * @return \Illuminate\Http\Response
     */
    public function show(ConversationParagraph $conversationParagraph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConversationParagraph  $conversationParagraph
     * @return \Illuminate\Http\Response
     */
    public function edit(ConversationParagraph $conversationParagraph)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConversationParagraph  $conversationParagraph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConversationParagraph $conversationParagraph)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConversationParagraph  $conversationParagraph
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConversationParagraph $conversationParagraph)
    {
        //
    }
}
