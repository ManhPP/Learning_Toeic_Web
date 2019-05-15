<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part5 extends Model
{
    protected $primaryKey='id';
    protected $table='part5s';
    protected $fillable = ['cauHoi','daA','daB','daC','daD','dADung'];
    function readingPart(){
        return $this->belongsToMany('App\ReadingPart','map_part5_reading_parts', 'idPartDoc', 'idCau')->withPivot('idPartDoc');
    }
}
