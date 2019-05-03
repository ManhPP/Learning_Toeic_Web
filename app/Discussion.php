<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $primaryKey = 'id';
    function comment(){
        return $this -> hasMany('App\Comment', 'idBTL');
    }
    
    function account(){ 
        return $this -> belongsTo('App\Account', 'idAcc');
    }
    
    function report(){
        return $this -> hasMany('App\Report', 'idBTL');
    }
    
}
