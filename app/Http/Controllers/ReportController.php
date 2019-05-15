<?php

namespace App\Http\Controllers;

use App\Report;
use Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addReport(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if ($userLogin==null || !$userLogin->can('addReport', Report::class)){
            return (Route('mylogincontroller.login'));
        }
        try {
            $report = new  Report();
            $report->noiDung = $request['noiDung'];
            $report->loaiReport = $request['loaiReport'];
            $report->isProcessed = 0;
            $report->idAcc = $request['accID'];

            $idCmt = $request['idCMT'];
            $idRepCmt = $request['idRepCMT'];
            $idBtl = $request['idBTL'];

            if ($idCmt != -1)
                $report->idCmt = $request['idCMT'];
            else if ($idRepCmt != -1)
                $report->idRepCmt = $request['idRepCMT'];
            else
                $report->idBtl = $request['idBTL'];
            $report->save();
            return "true";
        }catch (\Exception $e){

        }
        return "false";
        // Report::create(['id'=>null],['noiDung'=>$noiDung],['loaiReport'=>$loaiReport],['isProcessed'=>0],['idAcc'=>$idAcc],['idBtl'=>$idBTL],['idCmt'=>$idCMT],['idRepCmt'=>$idRepCMT]);
    }
    

    public function changeStatusProcess(Request $request){
        $userLogin = Auth::guard("accounts")->user();
        if ($userLogin==null || !$userLogin->can('changeStatusProcess', Report::class)){
            return (Route('mylogincontroller.login'));
        }
        try{
            $id = $request["id"];
            $report = Report::find($id);
            $report->isProcessed = 1;
            $report->save();
            return "true";
        }catch (\Exception $e){

        }
        return "false";
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
