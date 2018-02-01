<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    protected $table = 'proveedores';
  protected $fillable = ['nit','nombre','telefono','ciudad'];
  public $timestamps = false;
}
