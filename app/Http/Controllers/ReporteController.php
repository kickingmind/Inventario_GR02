<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Remision_salida;
use App\Almacen;
use App\Producto;
use App\Cat_producto;
use App\User;
use DB;

class ReporteController extends Controller
{
    public function indexProductos(){


       $productoss = DB::table('productos')
       ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
       ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
       ->select('productos.id', 'productos.codigo', 'productos.nombre' , 'productos.cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen', 'productos.url_imagen')
       ->get();

       $almacen = Almacen::orderBy('nombre','asc')->pluck('nombre','id');

    	
      return view('reporte.indexProductos',compact('almacen','productoss'));
    }



    public function indexRemision(){

       $remision = DB::table('remision_salida')
       ->join('users','users.id','=','remision_salida.id_solicitante')
       ->select('remision_salida.id as codigo', 'remision_salida.created_at','users.name as solicitante')
       //->selectRaw->selectRaw("DATE_FORMAT(remision_salida.fecha,'%d-%m-%Y')")
       ->orderBy('codigo','desc')
       ->get();
       
       //para que aparezca fecha carbon se debe trabajar con consultas eloquen
       //$remision = Remision_Salida::all();
       //dd($remision);exit;
       //return view("factura",compact('fechas')); 
      
       return view ('reporte.indexRemision',compact('remision'));
      //return $remision;
    }

}
