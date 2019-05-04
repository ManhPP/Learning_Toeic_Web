<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part5 extends Model
{
    protected $primaryKey='id';
    protected $table='part5s';
    function readingPart(){
        $this->belongsToMany('App/ReadingPart','map_part5_reading_part')->withPivot('idPartDoc');
    }
}
