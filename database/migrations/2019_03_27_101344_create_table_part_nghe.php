<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePartNghe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PartNghe', function (Blueprint $table) {
            $table->integer('Id',true);
            $table->string('Intro',4000);
            $table->string('Audio');
            $table->string('LoaiPart');
            $table->integer('AccessCount');
            $table->string('Title');
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
        Schema::dropIfExists('PartNghe');
    }
}
