<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part6 extends Model
{
    protected $primaryKey='id';
    protected $table='part6s';
    function part6Paragraph(){
        $this->belongsTo('App/Part6Paragraph','idDoan','id');
    }
}
