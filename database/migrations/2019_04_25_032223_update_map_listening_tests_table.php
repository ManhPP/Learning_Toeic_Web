<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMapListeningTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_listening_tests', function (Blueprint $table) {
            $table->foreign('idBKT')->references('id')->on('tests');
            $table->foreign('idPartNghe')->references('id')->on('listening_parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_listening_tests', function (Blueprint $table) {
            //
        });
    }
}
