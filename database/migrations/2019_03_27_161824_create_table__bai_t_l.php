<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBaiTL extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BaiTL', function (Blueprint $table) {
//            $table->integer('Id',true);
//            $table->string('TieuDe',400);
//            $table->string('NoiDung',4000);
//            $table->integer('AccessCount');
//            $table->date('NgayDang');
//            $table->integer('IdUser');
//            $table->timestamps();
//
//            $table->foreign('IdUser')->references('Id')->on('Account');
            $table->increments('id')->nullable(false);
            $table->string("tieuDe", 1000)->nullable(false);
            $table->string('noiDung', 10000)->nullable(false);
            $table->integer('accessCount')->nullable(false);
            $table->date('ngayDang')->nullable(false);
            $table->integer('idAcc')->nullable(false);

            $table->foreign('idAcc')->references('id')->on("Account");

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
        Schema::dropIfExists('BaiTL');
    }
}
