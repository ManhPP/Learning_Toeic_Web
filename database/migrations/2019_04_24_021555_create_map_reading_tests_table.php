<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapReadingTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_reading_tests', function (Blueprint $table) {
            $table->integer('idBKT')->nullable(false);
            $table->integer('idPartDoc')->nullable(false);

            $table->primary(array('idBKT', 'idPartDoc'));

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
        Schema::dropIfExists('map_reading_tests');
    }
}
