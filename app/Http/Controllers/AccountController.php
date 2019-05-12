<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;
use DateTime;

class AccountController extends Controller
{
    public function get(){
        $arrUser=Account::all();
        return view('admin_account')->with("arrUser",$arrUser);

    }

    //ban tài khoản
    public function ban(Request $request){
        $arrUser=$request["arrId"];
       try{ foreach($arrUser as $acc){
            Account::find($acc->id)->update(['active'=>0]);
            }
            return 1;
        }catch(Exception $e){

        }
        return 2;
    }

    //unban tài khoản
    public function unban(Request $request){
        $arrUser=$request["arrId"];
       try{ foreach($arrUser as $acc){
            Account::find($acc->id)->update(['active'=>1]);
            }
            return 1;
        }catch(Exception $e){

        }
        return 2;
    }

    public function registerIndex(){
        return View("register");
    }

    public function doRegister(Request $request){

        error_log("asdasdadasdasda");
        $hoTen = $request["hoTen"];
        $username = $request["username"];
        $pass = \Hash::make($request["pass"]);
        $ngaySinh = $request["ngaySinh"];
        $gioiTinh = $request["gioiTinh"];
        $email = $request["email"];


        $newDate = date("Y-m-d", strtotime($ngaySinh));

        $acc = new Account();
        $acc->hoTen = $hoTen;
        $acc->username= $username;
        $acc->pass = $pass;
        $acc->ngaySinh = $newDate;
        $acc->gioiTinh = $gioiTinh;
        $acc->email = $email;
        $acc->hasRole = "ROLE_ADMIN";
        $acc->active = 1;
        $acc->save();
        return redirect(Route('mylogincontroller.login'));
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
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
