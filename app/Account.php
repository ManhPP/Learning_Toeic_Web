<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Account extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table='accounts';
    protected $fillable=['hoTen','ngaySinh','username','pass','email','gioiTinh','hasRole','active'];
    function discussion(){
        return $this -> hasMany('App\Discussion','idAcc');
    }
    function comment(){
        return $this -> hasMany('App\Comment', 'idAcc');
    }
    function test(){
        return $this -> belongsToMany('App\Test','map_user_tests') -> withPivot('ngayLam');
    }
    function replyComment(){
        return $this -> hasMany('App\ReplyComment', 'idAcc');
    }
    function report(){
        return $this -> hasMany('App\Report', 'idAcc');
    }
    function listeningPart(){
        return $this -> belongsToMany('App\ListeningPart','map_user_listenings') -> withPivot('ngayLam');
    }
    function readingPart(){
        return $this -> belongsToMany('App\ReadingPart','map_user_readings') -> withPivot('ngayLam');
    }
    
}
