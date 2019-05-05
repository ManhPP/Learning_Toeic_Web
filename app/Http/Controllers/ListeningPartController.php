<?php

namespace App\Http\Controllers;

use App\ListeningPart;
use Illuminate\Http\Request;
use App\Http\Requests;

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

    public function createpart1(Request $request)
    {
        //
        $listeningPart=new ListeningPart;
        $bodyContent = $request->getContent();
        // $listeningPart->audio=INPUT::get('audio');
        // $listeningPart->intro=INPUT::get('intro');
        // $listeningPart->loaiPart=INPUT::get('loaiPart');
        // $listeningPart->acessCount=INPUT::get('acessCount');
        // $listeningPart->title=INPUT::get('title');
        // $listeningPart->save();
        return $bodyContent;

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
