<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devolucion';
    protected $fillable = ['n_devolucion','fecha','id_movimientos','n_remision','	tipo_devolucion'];
}
