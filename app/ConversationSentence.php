<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationSentence extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table='conversation_sentences';
    protected $fillable=['idDoanHT','cauHoi','dAA','dAB','dAC','dAD','dADung'];
    function conversationParagraph(){
        function conversationParagraph(){
            return $this -> belongsTo('App\ConversationSentence', 'idDoanHT');
        }
    }
}
