<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemisionSalidamigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remision_salida', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n_remision');
            $table->datetime('fecha');
            $table->integer('id_solicitante')->unsigned();
            $table->string('compania');
            $table->string('area');
            $table->string('realizadopor');
            $table->integer('id_movimientos')->unsigned();
            $table->foreign('id_solicitante')->references('id')->on('users');
            $table->foreign('id_movimientos')->references('id')->on('movimiento');
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
        Schema::dropIfExists('remision_salida');
    }
}
