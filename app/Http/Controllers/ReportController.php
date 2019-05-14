<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addReport(Request $request){
        $report=new  Report();
        $report->noiDung=$request['noiDung'];
        $report->idAcc=$request['accID'];
        $report->loaiReport=$request['loaiReport'];
        $report->idCmt=$request['idCMT'];
        $report->idRepCmt=$request['idRepCMT'];
        $report->idBtl=$request['idBTL'];
        $report->isProcessed=0;
        $report->save();
        // Report::create(['id'=>null],['noiDung'=>$noiDung],['loaiReport'=>$loaiReport],['isProcessed'=>0],['idAcc'=>$idAcc],['idBtl'=>$idBTL],['idCmt'=>$idCMT],['idRepCmt'=>$idRepCMT]);
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
