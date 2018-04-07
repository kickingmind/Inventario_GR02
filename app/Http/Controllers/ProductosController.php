<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Cat_producto;
use App\Almacen;
use DB;
use Auth;

class ProductosController extends Controller
{
    
  public function __construct()
    {
      $this->middleware(['auth','admin']);
   }

    //listar todos los productos
    public function index()
    {
       
        $productoss = DB::table('productos')
       ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
       ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
       ->select('productos.id', 'productos.codigo', 'productos.nombre' , 'productos.cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen', 'productos.url_imagen')
       ->get();
       
         //productos->id; 
        //$productos = Producto::all();
        return view('productos.index',compact('productos','productoss'));
   
    }


    //crear productos

    public function create()

    {

       
    $categorias = Cat_producto::orderBy('nombre','asc')->pluck('nombre','id');
    $almacen = Almacen::orderBy('nombre','asc')->pluck('nombre','id');
       
        return view('productos.crear',compact('categorias','almacen'));
    }

  
    public function store(Request $request)
    {
       //Validar la informacion ingresada

          $this->validate($request, [
            'codigo' => 'required |unique:Productos',
            'nombre' => 'required',
            'cantidad' => 'required|numeric',
            'idcategoria' => 'required',
            'almacen' => 'required',
            'archivo' => 'mimes:jpeg,png'
           
        ]); 

       //Cambiar nombre y Guardar el archivo

        $now = new \DateTime();
        $fecha = $now->format('Ymd-His');
        $codigo = $request->get('codigo');
        $archivo = $request->file('archivo');
        $nombre = "";

        if($archivo){
            $extension = $archivo->getClientOriginalExtension();
            //$nombre = "producto-".$numero."-".$fecha.".".$extension;
            $nombre = "producto-".$codigo.".".$extension;
            \Storage::disk('local')->put($nombre, \File::get($archivo));
        }


       
         //Insertar la Información en la tabla

           
           
        
         $producto = Producto::create([
            'codigo'=>$request->get('codigo'),
            'nombre'=>ucfirst(strtolower($request->get('nombre'))),
            'cantidad'=>$request->get('cantidad'),
            'id_categoria'=>$request->get('idcategoria'),
            'id_almacen'=>$request->get('almacen'),
            'url_imagen'=>$nombre,
            'usuario'=>(Auth::user()->name),

        ]);
        
        return redirect()->route('productos.index');


    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
         $almacen = Almacen::orderBy('nombre','asc')->pluck('nombre','id');
         $categorias = Cat_producto::orderBy('nombre','asc')->pluck('nombre','id');
         $productos = Producto::find($id);
      
        return view('productos.editar',compact('productos','categorias','almacen'));
        
    }

  
    public function update(Request $request, $id)
    {
        //Validar la informacion ingresada

          $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required',
            'cantidad' => 'required|numeric',
            'idcategoria' => 'required',
            'almacen' => 'required',
            'archivo' => 'mimes:jpeg,png'
           
        ]); 

       //Cambiar nombre y actualizar el archivo

        $now = new \DateTime();
        $fecha = $now->format('Ymd-His');
        $numero = $request->get('codigo');
        $archivo = $request->file('archivo');
        $nombre = "";

        if($archivo){
            $extension = $archivo->getClientOriginalExtension();
            //$nombre = "producto-".$numero."-".$fecha.".".$extension;
            $nombre = "producto-".$numero.".".$extension;
            \Storage::disk('local')->put($nombre, \File::get($archivo));
        }


        //actualizar la nueva informacion
        $productos = Producto::find($id);
        $productos->codigo = $request->get('codigo');
        $productos->nombre = $request->get('nombre');
        $productos->cantidad = $request->get('cantidad');
        $productos->id_categoria = $request->get('idcategoria');
        $productos->id_almacen = $request->get('almacen');
        if($archivo){            
            $productos->url_imagen = $nombre;
        }
        
        $productos->save();

        return redirect()->route('productos.index');


    }

  
    public function destroy($id)
    {
        $productos = Producto::find($id);
        $archivo = $productos->url_imagen;
        \Storage::delete($archivo);
        $productos->delete();

        return redirect()->route('productos.index');   
    }

    public function editNuevaCantidad($id)
    {
        //Validar la informacion ingresada

        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required',
            'cantidad' => 'required|numeric',
            'idcategoria' => 'required',
            'almacen' => 'required',
            'archivo' => 'mimes:jpeg,png'
           
        ]); 

       //Cambiar nombre y actualizar el archivo

        $now = new \DateTime();
        $fecha = $now->format('Ymd-His');
        $numero = $request->get('codigo');
        $archivo = $request->file('archivo');
        $nombre = "";

        if($archivo){
            $extension = $archivo->getClientOriginalExtension();
            //$nombre = "producto-".$numero."-".$fecha.".".$extension;
            $nombre = "producto-".$numero.".".$extension;
            \Storage::disk('local')->put($nombre, \File::get($archivo));
        }


        //actualizar la nueva informacion
        $productos = Producto::find($id);
        $productos->codigo = $request->get('codigo');
        $productos->nombre = $request->get('nombre');
        $productos->cantidad = $request->get('cantidad');
        $productos->id_categoria = $request->get('idcategoria');
        $productos->id_almacen = $request->get('almacen');
        if($archivo){            
            $productos->url_imagen = $nombre;
        }
        
        $productos->save();

        return redirect()->route('productos.index');
   
    }
}
