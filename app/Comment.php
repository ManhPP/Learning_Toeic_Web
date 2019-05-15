<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table='comments';
    protected $fillable=['noiDung','ngayDang','idBTL','idAcc'];
    function discussion(){
        return $this -> belongsTo('App\Discussion','idBTL');
    }

    function account(){
        return $this -> belongsTo('App\Account','idAcc');
    }
    
    function report(){ 
        return $this -> hasMany('App\Report','idCmt','id');
    }
    
    function replyComment(){    
        return $this -> hasMany('App\ReplyComment','idCmt');
    }
    
}
