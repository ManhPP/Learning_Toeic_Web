<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'reports';
    protected $fillable = [
        'noiDung', 'loaiReport', 'isProcessed','idAcc','idBtl','idCmt','idRepCmt'
    ];

    function discussion(){
        return $this -> belongsTo('App\Discussion', 'idBtl', 'id');
    }

    function user(){
        return $this -> belongsTo('App\Account', 'idAcc', 'id');
    }

    function comment(){
        return $this -> belongsTo('App\Comment', 'idCmt', 'id');
    }

    function replyComment(){
        return $this->belongsTo('App\ReplyComment', 'idRepCmt', 'id');
    }
}
