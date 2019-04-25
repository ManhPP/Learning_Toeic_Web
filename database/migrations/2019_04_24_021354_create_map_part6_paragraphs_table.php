<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapPart6ParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_part6_paragraphs', function (Blueprint $table) {
            $table->integer('idDoanVan')->nullable(false);
            $table->integer('idPartDoc')->nullable(false);

            $table->primary(array('idDoanVan', 'idPartDoc'));

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
        Schema::dropIfExists('map_part6_paragraphs');
    }
}
