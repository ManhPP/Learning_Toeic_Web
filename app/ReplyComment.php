<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $primaryKey='id';
    protected $table='reply_comments';
    protected $fillable = ['noiDung', 'ngayDang'];
    function comment(){
        return $this->belongsTo('App\Comment','idCmt','id');
    }
    function account(){
        return $this->belongsTo('App\Account','idAcc','id');
    }
}
