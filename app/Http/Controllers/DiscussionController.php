<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
   public function accessDiscussion(Request $request){
       $id = $request["id"];
       $btl = Discussion::find($id);
       return view('user-thaoluan-view',['btl'=>$btl]);

   }
}
