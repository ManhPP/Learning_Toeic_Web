<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationSentence extends Model
{
    //
    function conversationParagraph(){
        function conversationParagraph(){
            return $this -> belongsTo('App\ConversationSentence', 'idDoanHT');
        }
    }
}
