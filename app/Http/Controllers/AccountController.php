<?php

namespace App\Http\Controllers;

use App\Account;
use App\Report;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use PHPUnit\Framework\Exception;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function get(){
        $arrUser=Account::all();
        $userLogin = Auth::guard("accounts")->user();
        $listReport = Report::where('isProcessed', '=', '0')->get();

        if( $userLogin==null || !$userLogin->can('manage', Account::class)){
            return redirect(Route('mylogincontroller.login'));
        }
        return view('admin_account')->with('listReport',$listReport)->with("arrUser",$arrUser)->with("noti",0 );

    }

    public function indexUpdateUserAccount(){
        $userLogin = Auth::guard("accounts")->user();
        if( $userLogin==null || !$userLogin->can('getIndexUpdate', Account::class)){
            return redirect(Route('mylogincontroller.login'));
        }
        return View("user_manage_account")->with('userLogin', $userLogin);
    }

    //ban tài khoảnhttp://127.0.0.1:8000/
    public function ban(Request $request){
        $userLogin = Auth::guard("accounts")->user();

        if( $userLogin==null || !$userLogin->can('manage', Account::class)){
            return (Route('mylogincontroller.login'));
        }


        $arrUser=$request["arrId"];
        try{
            foreach($arrUser as $id) {
                $acc = Account::find($id);
                $acc->active = 0;
                $acc->save();
            }
            return 1;
        }catch(Exception $e){

        }
        return 2;
    }

    //unban tài khoản
    public function unban(Request $request){
        $userLogin = Auth::guard("accounts")->user();

        if( $userLogin==null || !$userLogin->can('manage', Account::class)){
            return (Route('mylogincontroller.login'));
        }


        $arrUser=$request["arrId"];
        try{
            foreach($arrUser as $id){
                $acc = Account::find($id);
                $acc->active = 1;
                $acc->save();
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

        $hoTen = $request["hoTen"];
        $username = $request["username"];
        $password = \Hash::make($request["password"]);
        $ngaySinh = $request["ngaySinh"];
        $gioiTinh = $request["gioiTinh"];
        $email = $request["email"];


        $newDate = date("Y-m-d", strtotime($ngaySinh));

        $acc = new Account();
        $acc->hoTen = $hoTen;
        $acc->username= $username;
        $acc->password = $password;
        $acc->ngaySinh = $newDate;
        $acc->gioiTinh = $gioiTinh;
        $acc->email = $email;
        $acc->hasRole = "ROLE_USER";
        $acc->active = 1;
        $acc->save();
        return redirect(Route('mylogincontroller.login'));
    }
    //thêm tài khoản
    public function add(Request $request){
        try{
            $acc = new Account();
            $acc->hoTen=$request['hoTen'];
            $acc->ngaySinh=$request['ngaySinh'];
            $acc->gioiTinh=$request['gioiTinh'];
            $acc->username=$request['username'];
            $pass=$request['pass'];
            $acc->password = Hash::make($pass);
            $acc->email=$request['email'];
            $acc->hasRole=$request['hasRole'];
            $acc->active = 1;
            // $check=Hash::check('admin', $pass); hàm check

            $acc->save();

            return Redirect::to('/admin/quanly/account');
        }catch(Exception $e){
             echo $e;
        }
    }

    //update tài khoản admin
    public function update(Request $request){
         try{
            $id=$request['ID'];
            $hoTen=$request['hoTen'];
            $ngaySinh=$request['ngaySinh'];
            $gioiTinh=$request['gioiTinh'];
            $username=$request['username'];
            $pass=$request['pass'];
            $email=$request['email'];
            $hasRole=$request['hasRole'];

            $userLogin = Auth::guard("accounts")->user();

            $tempAcc = new Account();
            $tempAcc->id = $id;

            if( $userLogin==null || !$userLogin->can('update', $tempAcc)){
                return redirect(Route('mylogincontroller.login'));
            }

            $acc = Account::find($id);


             if($hoTen!=""){
                $acc->hoTen = $hoTen;
            }
            if($ngaySinh!=""){
                $acc->ngaySinh = $ngaySinh;
            }
            if($gioiTinh!=""){
                $acc->gioiTinh = $gioiTinh;
            }
            if($username!=""){
                $acc->username= $username;
            }
            if($pass!=""){
                $pass = Hash::make($pass);
                $acc->password = $pass;
            }
            if($email!=""){
                $acc->email = $email;
            }
            if($hasRole!=""){
                $acc->hasRole = $hasRole;
            }

            $acc->save();


        }catch(Exception $e){
             echo $e;
        }
        return Redirect::to('/admin/quanly/account');
    }

    //update tài khoản user
        public function updateForUser(Request $request){
        try{
            $id=$request['id'];
            $hoTen=$request['hoTen'];
            $ngaySinh=$request['ngaySinh'];
            $gioiTinh=$request['gioiTinh'];
            $username=$request['username'];
            $pass=$request['pass'];
            $email=$request['email'];

            $userLogin = Auth::guard("accounts")->user();

            $tempAcc = new Account();
            $tempAcc->id = $id;

            if( $userLogin==null || !$userLogin->can('update', $tempAcc)){
                return redirect(Route('mylogincontroller.login'));
            }

            $acc = Account::find($id);


            if($hoTen!=""){
                $acc->hoTen = $hoTen;
            }
            if($ngaySinh!=""){
                $acc->ngaySinh = $ngaySinh;
            }
            if($gioiTinh!=""){
                $acc->gioiTinh = $gioiTinh;
            }
            if($username!=""){
                $acc->username= $username;
            }
            if($pass!=""){

                $pass = Hash::make($pass);
                $acc->password = $pass;
            }
            if($email!=""){
                $acc->email = $email;
            }


            $acc->save();
            Auth::guard('accounts')->logout();

            return "true";
        }catch(Exception $e){
            echo $e;
        }
        return "false";
    }

    public function delete(Request $request){
        $arrID = $request["id"];

        $userLogin = Auth::guard("accounts")->user();

        error_log("asdasdasd");
        foreach($arrID as $id){
            $tempAcc=Account::find($id);


            if( $userLogin==null || !$userLogin->can('delete', $tempAcc)){
                return (Route('mylogincontroller.login'));
            }
            $check = $tempAcc->delete();

            if($check==0) return 0;
        }
        return 1;
    }


    public function checkuser(Request $request){
        $username=$request['username'];
        $check=Account::where('username',$username)->get();
        \Log::info($check);
        return $check;
    }

    
    public function checkemail(Request $request){
        $email=$request['email'];
        $check=Account::where('email',$email)->get();
        \Log::info($check);
        return $check;
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
