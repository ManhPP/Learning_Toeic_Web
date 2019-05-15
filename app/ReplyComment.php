<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $primaryKey='id';
    protected $table='reply_comments';
    protected $fillable=['noiDung','ngayDang','idCmt','idAcc'];
    function comment(){

        return $this->belongsTo('App\Comment','idCmt','id');
    }
    function account(){
        return $this->belongsTo('App\Account','idAcc','id');
    }
    function report(){
        return $this -> hasMany('App\Report', 'idRepCmt','id');

    }
}
