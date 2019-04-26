<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationSentencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_sentences', function (Blueprint $table) {
            $table->integer('id', true);
            $table -> integer('idDoanHT');
            $table -> text('cauHoi');
            $table -> text('dAA');
            $table -> text('dAB');
            $table -> text('dAC');
            $table -> text('dAD');
            $table -> string('dADung', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversation_sentences');
    }
}
