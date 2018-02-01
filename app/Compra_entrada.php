<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra_entrada extends Model
{
    protected $table = 'compra_entrada';
    protected $fillable = ['n_compra','fecha','id_proveedor','facturapdf'];
    
}
