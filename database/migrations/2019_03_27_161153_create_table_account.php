<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Account', function (Blueprint $table) {
//            $table->integer('Id',true);
//            $table->string('HoTen',50);
//            $table->date('NgaySinh');
//            $table->string('Username',20);
//            $table->string('Password',20);
//            $table->string('Email',50);
//            $table->string('GioiTinh',10);
//            $table->string('HasRole');
//            $table->integer('Active');
//            $table->timestamps();
//
//            $table->unique('Username');
//            $table->unique('Email');

            $table->integer("id")->nullable(false);
            $table->primary('id');
            $table->string("hoTen",256)->nullable(false);
            $table->string("username",256)->nullable(false);
            $table->date("ngaySinh")->nullable(false);
            $table->string("pass",256)->nullable(false);
            $table->string("email",256)->nullable(false);
            $table->string("gioiTinh",10)->nullable(false);
            $table->string("hasRole",30)->nullable(false);
            $table->boolean("active")->nullable(false);


            $table->unique("username");
            $table->unique("email");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Account');
    }
}
