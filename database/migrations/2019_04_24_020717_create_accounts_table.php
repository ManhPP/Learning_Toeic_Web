<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->integer('id', true);
            $table ->string('hoTen', 65);
            $table -> date('ngaySinh');
            $table ->string('username') -> unique();
            $table -> string('pass');
            $table -> string('email') -> unique();
            $table -> string('gioiTinh', 10);
            $table ->string('hasRole', 32);
            $table -> boolean('active');
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
        Schema::dropIfExists('accounts');
    }
}
