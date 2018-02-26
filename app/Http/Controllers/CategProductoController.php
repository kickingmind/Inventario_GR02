<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cat_producto;
use DB;
use Auth;

class CategProductoController extends Controller
{
    
    public function __construct(){
 
      $this->middleware(['auth','admin']);

     }



    public function index()
    {

        $categoriaProductos = Cat_producto::all();
    	return view('categoria_producto.index',compact('categoriaProductos'));
    }


    Public function crear(){

    return view('categoria_producto.crear');

    }


    Public function guardar(Request $request)
    {

    	//Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 


         //Insertar la Información en la tabla
         $producto = Cat_producto::create([
            'nombre'=>ucfirst(strtolower($request->get('nombre'))),
        ]);

        return redirect()->route('categProductos');

    }


    public function editar($id)
    {
       
       $categoria = Cat_producto::find($id);

       return view('categoria_producto.editar',compact('categoria'));


    }


    public function actualizar(Request $request, $id)
    {

      
       //Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 

         //actualizar la nueva informacion
        $categoria = Cat_producto::find($id);
        $categoria->nombre = ucfirst(strtolower($request->get('nombre')));
       
        $categoria->save();

        return redirect()->route('categProductos');


    }


    public function eliminar($id)
    {
        $categoria = Cat_producto::find($id);
        
        $categoria->delete();

        return redirect()->route('categProductos');  
    }
}
