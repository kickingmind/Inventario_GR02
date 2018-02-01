<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Devoluciondamigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_devolucion');
            $table->datetime('fecha');
            $table->string('realizadopor');
            $table->integer('id_movimientos')->unsigned();
            $table->integer('n_remision');
            $table->string('tipo_devolucion');
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
        Schema::dropIfExists('devolucion');
    }
}
