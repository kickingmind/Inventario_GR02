<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompraEntradamigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_entrada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_compra');
            $table->datetime('fecha');
            $table->integer('id_proveedor')->unsigned();
            $table->text('facturapdf');
            $table->string('realizadopor');
            $table->integer('id_movimientos')->unsigned();
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
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
        Schema::dropIfExists('compra_entrada');
    }
}
