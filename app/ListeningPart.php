<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningPart extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'listening_parts';
    protected $fillable=['intro','audio','loaiPart','acessCount','title'];

    public function part1(){
        return $this->hasMany('App\Part1','idPartNghe','id');
    }

    public function part2(){
        return $this->hasMany('App\Part2','idPartNghe','id');
    }

    public function conversation_paragraph(){
        return $this->hasMany('App\ConversationParagraph','idPartNghe','id');
    }

    public function users(){
        return $this->belongsToMany('App\Account','map_user_listenings','idPartNghe','idAcc')
            ->withPivot('ngayLam');
    }

    public function tests(){
        return $this->belongsToMany('App\Test','map_listening_tests','idPartNghe','idBKT');
    }
}
