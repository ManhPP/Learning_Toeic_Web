<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $primaryKey = 'id';
    function discussion(){
        return $this -> belongsTo('App\Discussion','idBTL');
    }

    function account(){
        return $this -> belongsTo('App\Account','idAcc');
    }
    
    function report(){ 
        return $this -> hasMany('App\Report','idCmt');
    }
    
    function replyComment(){    
        return $this -> hasMany('App\ReplyComment','idCmt');
    }
    
}
