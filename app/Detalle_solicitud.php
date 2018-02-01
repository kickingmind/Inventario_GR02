<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_solicitud extends Model
{
   
    protected $table = 'detalle_solicitud';
    protected $fillable = ['id_producto'];
}
