<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part6Paragraph extends Model
{
    protected $primaryKey='id';
    protected $table='part6_paragraphs';

    function readingPart(){
        return $this->belongsToMany('App\ReadingPart','map_part6_paragraphs','idDoanVan','idPartDoc');
    }

    function part6(){
        return $this->hasMany('App\Part6','idDoan','id');
    }
}
