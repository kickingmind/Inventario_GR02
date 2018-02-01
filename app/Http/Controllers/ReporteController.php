<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Remision_salida;
use App\Almacen;
use App\User;
use DB;

class ReporteController extends Controller
{
    public function indexProductos(){

       $almacen = Almacen::orderBy('nombre','asc')->pluck('nombre','id');

    	
      return view('reporte.indexProductos',compact('almacen'));
    }



    public function indexRemision(){

       $remision = DB::table('remision_salida')
       ->join('users','users.id','=','remision_salida.id_solicitante')
       ->select('remision_salida.id as codigo', 'remision_salida.created_at','users.name as solicitante')
       //->selectRaw->selectRaw("DATE_FORMAT(remision_salida.fecha,'%d-%m-%Y')")
       ->orderBy('codigo','desc')
       ->get();
       
       //$remision = Remision_Salida::all();
       
       //return view("factura",compact('fechas')); 
      
       return view ('reporte.indexRemision',compact('remision'));
      //return $remision;
    }

}
