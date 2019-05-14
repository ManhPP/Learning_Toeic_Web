<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table='discussions';
    protected $fillable=['tieuDe','noiDung','accessCount','ngayDang','idAcc'];
    function comment(){
        return $this -> hasMany('App\Comment', 'idBTL');
    }
    
    function account(){ 
        return $this -> belongsTo('App\Account', 'idAcc');
    }
    
    function report(){
        return $this -> hasMany('App\Report', 'idBtl','id');
    }
    
}
