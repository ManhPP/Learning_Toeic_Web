<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part2 extends Model
{
    protected $primaryKey='id';
    protected $table='part2s';
    protected $fillable=['idPartNghe','dADung'];
    function listeningPart(){
        return $this->belongsTo('App\ListeningPart','idPartNghe','id');
    }
}
