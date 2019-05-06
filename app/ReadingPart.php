<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingPart extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'loaiPart', 'accessCount', 'title'
    ];


    function users(){
        return $this->belongsToMany('App\Account', 'map_user_readings', 'idPartDoc', 'idAcc')
            ->withPivot('ngayLam');
    }

    function cauPart5s(){
        return $this->belongsToMany('App\Part5', 'map_part5_reading_parts', 'idPartDoc', 'idCau');
    }

    function part6Paragraphs(){
        return $this->belongsToMany('App\Part6Paragraph', 'map_part6_paragraphs', 'idPartDoc', 'idDoanVan');
    }

    function part7Paragraphs(){
        return $this->belongsToMany('App\Part7Paragraph', 'map_part7_paragraphs', 'idPartDoc', 'idDoanVan');
    }

    function tests(){
        return $this->belongsToMany('App\Test', 'map_reading_tests', 'idPartDoc', 'idBKT');
    }
}