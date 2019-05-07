<?php

namespace App\Http\Controllers;

use App\ConversationParagraph;
use App\ListeningPart;
use Illuminate\Http\Request;

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
