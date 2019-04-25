<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapListeningTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_listening_tests', function (Blueprint $table) {
            $table->integer('idBKT')->nullable(false);
            $table->integer('idPartNghe')->nullable(false);

            $table->primary(array('idBKT', 'idPartNghe'));
            
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
        Schema::dropIfExists('map_listening_tests');
    }
}
