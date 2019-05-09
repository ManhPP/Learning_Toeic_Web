<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part7Paragraph extends Model
{
    protected $primaryKey = 'id';
    protected $table='part7_paragraphs';
    protected $fillable = [
        'doanVan1', 'doanVan2', 'loaiPart7'
    ];

    public function cauPart7s(){
        return $this -> hasMany('App\Part7', 'idDoan', 'id');
    }

    public function readingParts(){
        return $this -> belongsToMany('App\ReadingPart','map_part7_paragraphs','idDoanVan','idPartDoc');
    }

}