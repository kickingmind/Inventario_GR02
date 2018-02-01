<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movimientomigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n_compra');
            $table->integer('n_remision');
            $table->integer('n_devolucion');
            $table->integer('id_productos')->unsigned();
            $table->integer('cantidad');
            $table->string('observacion');
            $table->string('tipo_movimiento');
            $table->string('realizadopor');
            $table->string('referencia');
            $table->string('unidad');
            $table->string('centrocosto');
            $table->foreign('id_productos')->references('id')->on('productos');
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
        Schema::dropIfExists('movimiento');
    }
}
