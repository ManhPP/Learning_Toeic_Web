<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapPart5ReadingPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_part5_reading_parts', function (Blueprint $table) {
            $table->integer('idPartDoc');
            $table->integer('idCau');
            $table->primary(array('idPartDoc', 'idCau'));
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
        Schema::dropIfExists('map_part5_reading_parts');
    }
}
