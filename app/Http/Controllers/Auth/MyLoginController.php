<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MyLoginController extends Controller
{
    public function getLogin(){
        return View("login");
    }

    public function postLogin(Request $request){
        $username = $request["username"];
        $pass = $request["pass"];
        if(Auth::guard('accounts')->attempt(['username'=>$username, 'password'=>$pass])){
            return redirect("/");
        }else{
            return redirect(Route('mylogincontroller.login'));
        }
    }

    public function logout(){
        Auth::guard('accounts')->logout();
        return redirect(URL(''));
    }

    public function username(){
        return 'username';
    }

}
