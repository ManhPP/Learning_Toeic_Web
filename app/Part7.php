<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part7 extends Model
{
    //
    protected $table='part7s';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cauHoi', 'daA', 'daB', 'daC', 'daD', 'daDung'
    ];

    function part7Paragraph(){
        return $this -> belongsTo('App\Part7Paragraph', 'idDoan', 'id');
    }
}
