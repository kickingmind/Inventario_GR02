<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Producto;
use App\User;
use App\Compania;
use App\Area;
use App\Movimiento;
use App\Remision_salida;
use App\Almacen;
use DB;
use Auth;

class Remision_SalidaController extends Controller
{

      //funcion para crear la variable sesion
 public function __construct(){
 
  $this->middleware(['auth','admin']);


 	if (!Session::has('remision'))  {
        Session::put('remision', array());
 	 }
 }

    //funcion para mostrar la vista del carrito de compras

	  public function show(){

       $productoss = DB::table('productos')
       ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
       ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
       ->select('productos.id', 'productos.codigo', 'productos.nombre' , 'productos.cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen', 'productos.url_imagen')
       ->get();


       $solicitante = User::orderBy('name','asc')->pluck('name','id');
       $compania = Compania::orderBy('nombre','asc')->pluck('nombre','id');
       $area = Area::orderBy('nombre','asc')->pluck('nombre','id');


       $remision = Session::get('remision');
       //return $remision;
  return view('remision',compact('remision','solicitante','compania','area','productoss'));
	  }

    //funcion para agregar items de productos a remision
     public function add($id){
     	$remision = Session::get('remision');
        $producto = Producto::find($id);
        $producto->cantidadd = 1;
        $remision[$producto->id] = $producto;
        Session::put('remision',$remision);
        //return Session::get('remision');
        return redirect()->route('remision');
     }


    //funcion para borrar items 
     public function delete ($id){
        
        //primero llamar la variable session en este caso $remision para obtener todo lo que esta en esa variable
        $remision = Session::get('remision');
        //luego usaremos la funcion unset lo cual esta funcion va a borrar especificamente el $id que estamos recibiendo de la variable $remision
        unset($remision[$id]);

        //luego actualizamos la remision con session put lo que nos quede en la variable remision y por 
        //ultimo retornamod a la vista carrito
        Session::put('remision',$remision);
        return redirect()->route('remision');
     }


    //funcion para borrar todos los items
     
      public function trash(){
        //utilizamos la function forget lo cual lo que haces es borrar todo lo que este en la variable session
        Session::forget('remision');
         return redirect()->route('remision');

      }

      public function detalleRemision(Request $request){
       
$remision =Session::get('remision'); 
 
foreach($_POST["id"] as $b=>$a)
{
  
    if(isset($remision[$a]))
    {  

    if($_POST["cantidad"][$b]>$remision[$a]->cantidad)
      { 
       $_POST["cantidad"][$b]=$remision[$a]->cantidad;
       /*con esto bastaria vamos a probar*/
      }   
      $remision[$a]->cantidadSelect=$_POST["cantidad"][$b];
      $remision[$a]->observacion=$_POST["observacion"][$b];
    }
} 


       $solicitante = User::orderBy('name','asc')->pluck('name','id');
       $compania = Compania::orderBy('nombre','asc')->pluck('nombre','id');
       $area = Area::orderBy('nombre','asc')->pluck('nombre','id');
            
       $codigoo = DB::table('remision_salida')
       ->orderBy ('id','desc','limit',1)
       ->get();

         
       //$producto = Producto::find($id);
       //$remision[$producto->id]->cantidad = $cantidad;
       //Session::put('remision',$remision);
  return view('detalle_remision',compact('remision','solicitante','compania','area','cantidad','codigoo'));
       //$cantidad =  $request->get('observacion');
      // $cantidad =  $request->get('cantidad');
       
      }



    //funcion para guardar remision de salida
      
      public function guardar(Request $request)
    {

/*se registra la remision y objetemos el objeto con el ID que sera el numero_de_remision */
     $remision=Remision_salida::create(
          [
            'fecha'=>$request->get('fecha'),/*por cierto no hace falta el get() */
            'id_solicitante'=>$request->get('solcitante'), 
            'area'=>$request->idarea,
            'compania'=>$request->idcompania,
            'centroCosto'=>$request->centroCosto,
            'realizadopor'=>Auth::user()->id,

          ]);


 
$productos =Session::get('remision'); 

foreach($productos as $id=>$producto)
{

/*si se desea usar con Movimiento:: se debe arreglar toda la programacion del objeto */

$ProductoOriginal=Producto::find($producto->id);/* llamo al objeto*/
$ProductoOriginal->cantidad-=$request->cantidad[$id];
/*
-el objeto tiene cantidad con un valor ya definido por la db en este caso fue 57.
-entonces usando el signo RESTA la digo que lo que viene lo voy a resta, $request->cantidad[$id]; (por este valor).
*/
$ProductoOriginal->save();/* ya luego al usar SAVE se activa automaticamente el update sin necesidad de hacer una preparacion y listo eso es todo wao interesante, por eso laravel es lo que es :D es mas facil cierto hacer muchas cosas, si entonces ya con esto es todo no ? eeee sii*/
$salida = "salida";
DB::table('movimiento')->insert(
[
"id_productos"=>$producto->id,
"n_remision"=>$remision->id,
"observacion"=>$request->observacion[$id],
"cantidad"=>$request->cantidad[$id],
"tipo_movimiento"=>$salida,
"realizadopor"=>Auth::user()->name,
]);


}



        Session::forget('remision');
        return redirect()->route('consultaRemision');/*ya aqui rediri ya lo que faltaria era hacerlo qye se exporte a pdf la remision y listo, bueno ya ahi tienes todos los datos alli arriba los mandas qa variable y listo usas una libreria que sea compatible con LARAVEL para hacerlo mas facil cual recomienda aun no he usado PDF con laravel jajajaja no me ha tocado todos los reportes los hace por html al correo o en el sistema osea q en ves de reporte pdf se lo envia es al correo y listo, puede ser o poner todo en html y usas un javascrit que es window.print();*/
        

    } 



}
