<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePart7ParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part7_paragraphs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('doanVan1', 512)->nullable(false);
            $table->string('doanVan2', 512)->nullable(true);
            $table->string('loaiPart7', 64)->nullable(false);

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
        Schema::dropIfExists('part7_paragraphs');
    }
}
