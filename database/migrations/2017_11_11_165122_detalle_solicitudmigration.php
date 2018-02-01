<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleSolicitudmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unidad');
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->string('centro_costo');
            $table->string('observacion');
            $table->foreign('id_producto')->references('id')->on('productos');
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
        Schema::dropIfExists('detalle_solicitud');
    }
}
