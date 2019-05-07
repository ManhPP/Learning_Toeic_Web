<?php

namespace App\Http\Controllers;

use App\ListeningPart;
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
