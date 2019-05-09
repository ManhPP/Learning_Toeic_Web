<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part6 extends Model
{
    protected $primaryKey='id';
    protected $table='part6s';
    protected $fillable = [
        'cauHoi', 'daA', 'daB', 'daC', 'daD', 'daDung'
    ];
    function part6Paragraph(){
        $this->belongsTo('App\Part6Paragraph','idDoan','id');
    }
}
