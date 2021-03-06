<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMapPart7ParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_part7_paragraphs', function (Blueprint $table) {
            $table->foreign('idDoanVan')->references('id')->on('part7_paragraphs');
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
        Schema::table('map_part7_paragraphs', function (Blueprint $table) {
            //
        });
    }
}
