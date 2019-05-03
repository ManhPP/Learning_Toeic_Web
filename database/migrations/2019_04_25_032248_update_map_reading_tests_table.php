<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMapReadingTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_reading_tests', function (Blueprint $table) {
            $table->foreign('idBKT')->references('id')->on('tests');
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
        Schema::table('map_reading_tests', function (Blueprint $table) {
            //
        });
    }
}
