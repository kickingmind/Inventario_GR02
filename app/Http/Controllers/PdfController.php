<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Cat_producto;
use App\Remision_salida;
use App\Movimiento;
use App\ALmacen;
use App\User;
use DB;

class PdfController extends Controller
{

 
    public function productospdf(){
     
     $condicion = "todosproductos";
     $productos = DB::table('productos')
       ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
        ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
       ->select('productos.id', 'productos.codigo as codigo', 'productos.nombre as nombre' , 'productos.cantidad as cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen as almacen', 'productos.url_imagen')
       ->orderBy('almacen.nombre','asc')
       //->where('productos.almacen','=','Comercial')
       ->get();

      
     $pdf = \App::make('dompdf.wrapper');
	 
	 
	 $vista =\View('pdf.productospdf',compact('productos','condicion'))->render();
     $pdf->loadHTML($vista);
	 return $pdf->stream('productos_en_Bodega.pdf');
 
     //return view('pdf.productospdf');

    }

   public function productos_almacenpdf(Request $request){
    $condicion = "almacenproductos";
    $almacen = $request->get('almacen');

    $productos = DB::table('productos')
     ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
     ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
     ->select('productos.id', 'productos.codigo as codigo', 'productos.nombre as nombre' , 'productos.cantidad as cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen as almacen', 'productos.url_imagen')
     ->orderBy('categorias_productos.nombre','asc')
     ->where('almacen.id','=',$almacen)
     ->get(); 
     
     $pdf = \App::make('dompdf.wrapper');

     $vista =\View('pdf.productospdf',compact('productos','almacen','condicion'))->render();
     $pdf->loadHTML($vista);
     return $pdf->stream('Productos_en_'.$productos[0]->almacen.'.pdf');

   }


     public function remisionpdf($id){

         $remision = DB::table('remision_salida')
         ->join('users','users.id','=','remision_salida.id_solicitante')
         ->join('movimiento','remision_salida.id','=','movimiento.n_remision')
         ->join('productos','movimiento.id_productos','=','productos.id')
         ->join('companias','remision_salida.compania','=','companias.id')
         ->join('areas','remision_salida.area','=','areas.id')
         //->leftJoin('movimiento', 'remision_salida.id', '=', 'movimiento.n_remision')
         ->select('remision_salida.id as codigo_remision','remision_salida.created_at','users.name as solcitante','companias.nombre as compania','areas.nombre as area','remision_salida.centroCosto as cc','productos.codigo as codigo','productos.nombre as producto','movimiento.cantidad as cantidad','movimiento.observacion as observacion')
        //->select('movimiento.n_remision')
        ->orderBy('remision_salida.id','asc')
        ->where('remision_salida.id','=',$id)
         ->get();
           
       //dd($remision[0]->area);
       
            
 

       $pdf = \App::make('dompdf.wrapper');

       
       $vista =\View('pdf.remisionpdf',compact('remision'))->render();
       $pdf->loadHTML($vista);
       return $pdf->stream('Remision_N_'.$id.'.pdf');
       

       //return view('pdf.remisionpdf',compact('remision'));
       
       


     }


}
