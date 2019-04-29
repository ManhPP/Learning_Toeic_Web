<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMapUserTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_user_tests', function (Blueprint $table) {
            $table->foreign('idAcc')->references('id')->on('accounts');
            $table->foreign('idBKT')->references('id')->on('tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_user_tests', function (Blueprint $table) {
            //
        });
    }
}
