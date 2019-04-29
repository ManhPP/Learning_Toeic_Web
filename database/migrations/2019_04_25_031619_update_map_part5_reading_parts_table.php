<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMapPart5ReadingPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_part5_reading_parts', function (Blueprint $table) {
            $table->foreign('idPartDoc')->references('id')->on('reading_parts');
            $table->foreign('idCau')->references('id')->on('part5s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_part5_reading_parts', function (Blueprint $table) {
            //
        });
    }
}
