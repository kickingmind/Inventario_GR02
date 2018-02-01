<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
  protected $fillable = ['fecha','n_solicitud','id_users','	id_detalle'];
   
}
