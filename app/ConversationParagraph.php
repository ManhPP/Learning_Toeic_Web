<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationParagraph extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table='conversation_paragraphs';
    protected $fillable=['idPartNghe','loaiPart'];
    function conversationSentence(){
        return $this -> hasMany('App\ConversationSentence','idDoanHT','id');
    }

    function listeningPart(){
        return $this -> belongsTo('App\ListeningPart','idPartnghe','id');
    }
}
