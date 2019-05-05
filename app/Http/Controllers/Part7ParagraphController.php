<?php

namespace App\Http\Controllers;

use App\Part7Paragraph;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class Part7ParagraphController extends Controller
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
     * @param  \App\Part7Paragraph  $part7Paragraph
     * @return \Illuminate\Http\Response
     */
    public function show(Part7Paragraph $part7Paragraph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Part7Paragraph  $part7Paragraph
     * @return \Illuminate\Http\Response
     */
    public function edit(Part7Paragraph $part7Paragraph)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Part7Paragraph  $part7Paragraph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part7Paragraph $part7Paragraph)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Part7Paragraph  $part7Paragraph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part7Paragraph $part7Paragraph)
    {
        //
    }

    public function getPart7Paragraph(Request $request){

        $arrDoan = Part7Paragraph::offset(0)->limit(20)->get();
        $sum = Part7Paragraph::count();
        return view('manager_para_part7')
            ->with("arrDoan", $arrDoan)->with("sum", $sum);
    }

    public function uploadFile(Request $request){
        $file = $request -> file('file-image');
        $current = Carbon::now()->timestamp;
        $fileName = rand().$current.".".$file->getClientOriginalExtension();
        $file->move(public_path('images_upload'), $fileName);
        return response(["pathFile"=>"images_upload"."/".$fileName], 200);
    }

    public function addPara(Request $request){
        $paraString = $request["part7"];
        $paraModel = json_decode($paraString);
        $part7Para = new Part7Paragraph();
        $part7Para -> fill(get_object_vars($paraModel));
        $part7Para -> save();
        foreach($part7Para->lisCauPart7 as $cau){
            error_log(($cau -> daA)."-------------");
        }
        return response("ok", 200);
    }
}
