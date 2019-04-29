<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateConversationSentencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversation_sentences', function (Blueprint $table) {
            $table->foreign('idDoanHT')->references('id')->on('conversation_paragraphs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversation_sentences', function (Blueprint $table) {
            //
        });
    }
}
