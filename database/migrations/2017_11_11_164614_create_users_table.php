<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->integer('id_area')->unsigned();
            $table->integer('id_compania')->unsigned();
            $table->string('user');
            $table->string('password');
            $table->integer('id_perfil')->unsigned();

            $table->foreign('id_area')->references('id')->on('areas');
            $table->foreign('id_compania')->references('id')->on('companias');
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
