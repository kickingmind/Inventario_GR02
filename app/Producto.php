<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo','nombre','cantidad','id_categoria','id_almacen','url_imagen','usuario'];
    //public $timestamps = false;
}
