<?php

namespace App\Http\Controllers;

use App\Account;
use App\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
   public function accessDiscussion(Request $request){
       $id = $request["id"];
       $btl = Discussion::find($id);
       $acc = Account::find(1);
       return view('user-thaoluan-view',['btl'=>$btl,'acc'=>$acc]);

   }
}
