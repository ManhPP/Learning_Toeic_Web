<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_parts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('loaiPart', 128)->nullable(false);
            $table->integer('accessCount')->nullable(false);
            $table->string('title')->nullable(false);

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
        Schema::dropIfExists('reading_parts');
    }
}
