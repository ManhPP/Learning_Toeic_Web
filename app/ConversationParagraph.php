<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationParagraph extends Model
{
    //
    protected $primaryKey = 'id';
    function conversationSentence(){
        return $this -> hasMany('App\ConversationSentence','idDoanHT');
    }

    function listeningPart(){
        return $this -> belongsTo('App\ListeningPart','idPartnghe');
    }
}
