<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $primaryKey='id';
    protected $table='reply_comments';
    function comment(){
        $this->belongsTo('App/Comment','idCmt','id');
    }
    function account(){
        $this->belongsTo('App/Account','idAcc','id');
    }
}
