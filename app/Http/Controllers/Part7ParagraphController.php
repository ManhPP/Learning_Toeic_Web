<?php

namespace App\Http\Controllers;

use App\Part7Paragraph;
use App\ReadingPart;
use Illuminate\Http\Request;

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
        $str = '';
        $part7Para = Part7Paragraph::find(1);
        foreach ($part7Para->cauPart7 as $cau){
            $str.=("-cau hoi-".($cau->cauHoi));
        }

        $readingPart = ReadingPart::find(1);
        foreach ($readingPart->part7Paragraphs as $para){
            $str.=("-para-".($para->doanVan1));
        }
        return $str;
    }
}
