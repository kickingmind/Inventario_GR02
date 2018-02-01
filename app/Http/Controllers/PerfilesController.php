<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request\StorePerfilesRequest2;
use App\Perfil;
//incluir el modelo llamado Perfil para que funcione
//Tener en cuenta las mayusculas App

class PerfilesController extends Controller
{
    
   public function __construct()
    {
       $this->middleware(['auth','admin']);
   }



    //Funcion index se encarga de listar todos los registros "Perfiles"
    public function index()
    {
        //Llama al modelo perfil para traer todos los registros de la tabla perfil
       $perfiles = Perfil:: all();
        return view('perfiles.index',compact('perfiles'));
        //return $perfiles;
    }

    //llamar la vista encargada de crear un nuevo perfil
    public function create()
    {

    }


    //recibir los datos y guardalos en la tabla perfiles
    public function store(Request $request)//ESTE <----
    {

     /* y aqui puedes hacer otras validaciones como hice yo */
     /* si nombre es igual a!!!! etc*/
 /*if(is_numeric($request->nombre)){ echo "es numerico"; /* ejecuta lo que necesitas *///}

/* if(is_string(intval($request->nombre))){  echo "es cadena de texto";/* ejecuta lo que necesitas *///}
/*exit;
      /* validamos que nombre no este vacio previniendo espacios en blanco */
     if(strlen((trim($request->nombre)))==0)
    { return response()->json(["error"=>"Campos vacios, debes colocar un nombre"],500); }

     /*validamos que nombre no exista ya en perfiles*/
     if(Perfil::where("nombre","=",$request->nombre)->count()>0)
    { return response()->json(["error"=>"El nombre ya está en uso, coloca otro nombre."],500); }

     $perfil=New Perfil();/*creamos un nuevo perfil TEMPORAL*/
     $perfil->nombre=$request->nombre;/*agregamos nombre al objeto temporal*/
     /*validando si guarda, ya al guardar deja de ser temporal y te dan el id del objeto*/
     if($perfil->save()){ /*retornamos objeto creado */ return response()->json($perfil,200); }
     else{ /*no guardo por errores de tabla o tiempo */ return response()->json(["error"=>"Error al registrar :(."],500);}


    }


    public function show($id)
    {
      return response()->json(Perfil::find($id));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request,$id)
    {


      if(strlen((trim($request->nombre)))==0)
     { return response()->json(["error"=>"Campos vacios, debes colocar un nombre"],500); }

      /*validamos que nombre no exista ya en perfiles*/
      $perfil=Perfil::find($id);

      if(Perfil::where("nombre","=",$request->nombre)->count()>0 && $perfil->nombre!==$request->nombre)
     { return response()->json(["error"=>"El nombre ya está en uso, coloca otro nombre."],500); }



    $perfil->nombre=$request->nombre;
    $perfil->save();
    return response()->json($perfil);
    }


    public function destroy($id)
    {
    Perfil::find($id)->delete();
    }
}
