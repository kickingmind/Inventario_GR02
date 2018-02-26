<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Date\Date;

class Movimiento extends Model
{
    protected $table = 'movimiento';
    protected $fillable = ['id_productos','tipo_movimiento'];


      public function getCreatedAtAttribute($date){
	  
	   return new Date($date);
	  }

   
      public function getUpdatedAtAttribute($date){
	  
	   return new Date($date);
	  }
}
