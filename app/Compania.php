<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
   protected $table = 'companias';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
