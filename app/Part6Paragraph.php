<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part6Paragraph extends Model
{
    protected $primaryKey='id';
    protected $table='part6_paragraphs';
    function readingPart(){
        $this->belongsToMany('App/ReadingPart','MapPart6Paragraph')->withPivot('idPartDoc');
    }
}
