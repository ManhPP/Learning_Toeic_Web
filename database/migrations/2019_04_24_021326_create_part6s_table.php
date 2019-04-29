<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePart6sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part6s', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idDoan')->nullable(false);
            $table->text('cauHoi')->nullable(false);
            $table->text('daA')->nullable(false);
            $table->text('daB')->nullable(false);
            $table->text('daC')->nullable(false);
            $table->text('daD')->nullable(false);
            $table->string('daDung', 2)->nullable(false);

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
        Schema::dropIfExists('part6s');
    }
}
