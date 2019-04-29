<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReplyCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reply_comments', function (Blueprint $table) {
            $table->foreign('idCMT')->references('id')->on('comments');
            $table->foreign('idAcc')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reply_comments', function (Blueprint $table) {
            //
        });
    }
}
