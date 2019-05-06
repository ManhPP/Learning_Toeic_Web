<?php

namespace App\Http\Controllers;

use App\Part6Paragraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Part6ParagraphController extends Controller
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
     * @param  \App\Part6Paragraph  $part6Paragraph
     * @return \Illuminate\Http\Response
     */
    public function show(Part6Paragraph $part6Paragraph)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Part6Paragraph  $part6Paragraph
     * @return \Illuminate\Http\Response
     */

    public function listPart6(){
        $data = DB::table('part6_paragraphs')->get();
        return view('add_part_6',['listPart6Para'=>$data]);
    }

    public function edit(Part6Paragraph $part6Paragraph)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Part6Paragraph  $part6Paragraph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part6Paragraph $part6Paragraph)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Part6Paragraph  $part6Paragraph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part6Paragraph $part6Paragraph)
    {
        //
    }
}
