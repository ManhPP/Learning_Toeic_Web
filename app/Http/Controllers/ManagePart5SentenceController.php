<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Part5;

class ManagePart5SentenceController extends Controller
{
    //
    public function index(){
        $arrCau = Part5::offset(0) -> limit(20) -> get();
        $sum = Part5::count();
        return View('admin_manager_cau_part5') -> with("arrCau", $arrCau) -> with("sum", $sum);
    }
}
