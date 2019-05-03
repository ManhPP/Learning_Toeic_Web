<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapUserReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_user_readings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idAcc')->nullable(false);
            $table->integer('idPartDoc')->nullable(false);
            $table->date('ngayLam')->nullable(false);


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
        Schema::dropIfExists('map_user_readings');
    }
}
