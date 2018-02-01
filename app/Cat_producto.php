<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_producto extends Model
{
    protected $table = 'categorias_productos';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
