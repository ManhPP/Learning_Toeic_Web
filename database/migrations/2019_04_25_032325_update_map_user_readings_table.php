<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMapUserReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_user_readings', function (Blueprint $table) {
            $table->foreign('idAcc')->references('id')->on('accounts');
            $table->foreign('idPartDoc')->references('id')->on('reading_parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_user_readings', function (Blueprint $table) {
            //
        });
    }
}
