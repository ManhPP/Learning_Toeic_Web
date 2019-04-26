<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListeningPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_parts', function (Blueprint $table) {
            $table->integer('id', true);
            $table -> string('intro');
            $table -> string('audio');
            $table -> string('loaiPart', 128);
            $table -> integer('acessCount');
            $table -> string('title');
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
        Schema::dropIfExists('listening_parts');
    }
}
