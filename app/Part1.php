<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part1 extends Model
{
    //
    protected $table='part1s';
    protected $primaryKey = 'id';
    protected $fillable = [
        'anh', 'dADung'
    ];

    function listeningPart(){
        return $this->belongsTo('App\ListeningPart','idPartNghe','id');
    }
}
