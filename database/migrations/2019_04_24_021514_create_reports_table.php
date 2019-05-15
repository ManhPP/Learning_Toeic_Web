<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->integer('id', true);
            $table -> text('noiDung');
            $table -> string('loaiReport');
            $table -> boolean('isProcessed');
            $table -> integer('idAcc');
            $table -> integer('idBtl')->nullable(true);
            $table -> integer('idCmt')->nullable(true);
            $table -> integer('idRepCmt')->nullable(true);
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
        Schema::dropIfExists('reports');
    }
}
