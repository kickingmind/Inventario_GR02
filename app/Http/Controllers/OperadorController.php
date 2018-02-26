<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;

use App\Producto;
use App\Cat_producto;
use App\Almacen;
use App\Remision_salida;
use App\User;
use DB;
use Auth;





class OperadorController extends Controller
{
    

public function __construct()
    {
        $this->middleware('auth');
    }
  


    public function index()
    {

       return view('operador.index');   
        
    }


    public function listarProductos()
    {
         $productoss = DB::table('productos')
    
    ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
        ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
       ->select('productos.id', 'productos.codigo', 'productos.nombre' , 'productos.cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen', 'productos.url_imagen')
       ->get();
        return view('operador.listarProductos',compact('productoss'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categorias = Cat_producto::orderBy('nombre','asc')->pluck('nombre','id');
       $almacen = Almacen::orderBy('nombre','asc')->pluck('nombre','id');
       
        return view('operador.crear',compact('categorias','almacen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

       //Cambiar nombre y Guardar el archivo

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

        return redirect('/operador');



    }


        public function reporteProductos(){

        $productoss = DB::table('productos')
       ->join('categorias_productos','categorias_productos.id' , '=' , 'productos.id_categoria')
       ->join('almacen','almacen.id' , '=' , 'productos.id_almacen')
       ->select('productos.id', 'productos.codigo', 'productos.nombre' , 'productos.cantidad' ,'categorias_productos.nombre as nombre_categoria', 'almacen.nombre as almacen', 'productos.url_imagen')
       ->orderBy('productos.nombre','asc')
       ->get();

       $almacen = Almacen::orderBy('nombre','asc')->pluck('nombre','id');

        
      return view('operador.indexProductos',compact('almacen','productoss'));

             
        }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
      
       return view ('operador.indexRemision',compact('remision'));
      //return $remision;
     }


     public function graficoPMSPM(Request $request){

         $mes = $request->mes; 

       $prodmes = DB::table('productos')
       ->leftJoin('movimiento','productos.id','=','movimiento.id_productos') 

       ->select(
        'productos.codigo as codigo',
        'productos.nombre as nombre',
        'movimiento.created_at as fecha',
         DB::raw('SUM(movimiento.cantidad) as cantidad')
        )
         ->whereYear('movimiento.created_at',2018) 
        ->whereMonth('movimiento.created_at',"$mes")

        ->groupBy('productos.codigo')
        ->orderBy('movimiento.cantidad', 'desc')
        ->limit(5)

       ->get();


       return view('operador.grafico15solicitado',compact('prodmes','mes'));

     }




     public function graficoPP($codigo)
    {

        
        $prodpp = DB::table('productos')
       ->leftJoin('movimiento','productos.id','=','movimiento.id_productos')
     
            ->select(
                'productos.codigo as codigo',
                'productos.nombre as nombre',
                'movimiento.created_at as fecha',
                'productos.url_imagen',
             DB::raw('SUM(movimiento.cantidad) as cantidad')
            )
            ->whereYear('movimiento.created_at',2018)
            ->where('productos.codigo',$codigo)
            ->groupBy(DB::raw("MONTH(movimiento.created_at)"))
            //->groupBy('movimiento.created_at')
            ->orderBy('movimiento.created_at', 'ASC')


            ->get();
          
          return view('operador.graficoproductopm',compact('prodpp'));
    }
}

