<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Date\Date;


class Remision_salida extends Model
{
    

    protected $table = 'remision_salida';
    protected $fillable = ['n_remision','nombre','fecha','id_solicitante','compania','area','realizadopor','centroCosto'];


     public function getCreatedAtAttribute($date){
	  
	   return new Date($date);
	  }

   
      public function getUpdatedAtAttribute($date){
	  
	   return new Date($date);
	  }

   
}

