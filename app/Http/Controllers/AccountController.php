<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function get(){
        $arrUser=Account::all();
        return view('admin_account')->with("arrUser",$arrUser)->with("noti",0 );

    }

    //ban tài khoản
    public function ban(Request $request){
        $arrUser=$request["arrId"];
       try{ foreach($arrUser as $id){
            Account::find($id)->update(['active'=>0]);
            }
            return 1;
        }catch(Exception $e){

        }
        return 2;
    }

    //unban tài khoản
    public function unban(Request $request){
        $arrUser=$request["arrId"];
       try{ foreach($arrUser as $id){
            Account::find($id)->update(['active'=>1]);
            }
            return 1;
        }catch(Exception $e){

        }
        return 2;
    }

    //thêm tài khoản
    public function add(Request $request){
        try{
        $hoTen=$request['hoTen'];
        $ngaySinh=$request['ngaySinh'];
        $gioiTinh=$request['gioiTinh'];
        $username=$request['username'];
        $pass=$request['pass'];
        $pass = Hash::make($pass);
        $email=$request['email'];
        $hasRole=$request['hasRole'];
        // $check=Hash::check('admin', $pass); hàm check
        
        $check=Account::create(['hoTen'=>$hoTen,'ngaySinh'=>$ngaySinh,'gioiTinh'=>$gioiTinh,'username'=>$username
        ,'pass'=>$pass,'email'=>$email,'hasRole'=>$hasRole,'active'=>1]);
       
        return $check;
        }catch(Exception $e){
             echo $e;
        }


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
