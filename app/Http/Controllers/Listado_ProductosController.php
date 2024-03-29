<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Cat_producto;
use app\Almacen;
use DB;
use Auth;

class Listado_ProductosController extends Controller
{
   

   public function __construct()
    {
      $this->middleware(['auth']);
   }	

   //listar todos los productos
    public function index()
    {

        $productoss = DB::table('productos')
       ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
       ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
       ->select('productos.id', 'productos.codigo', 'productos.nombre' , 'productos.cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen', 'productos.url_imagen')
       ->get();
       
        //return view('listado_producto.index',compact('productoss'));


        if ((Auth::user()->id_perfil ==3 )) {
           return view('listado_producto.index',compact('productoss'));
       }else{
         return view('operador.listado_productos',compact('productoss'));
       }
   
    }
}
