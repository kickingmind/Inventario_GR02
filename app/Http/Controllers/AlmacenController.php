<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Almacen;


class AlmacenController extends Controller
{
    
    public function __construct()
    {
       $this->middleware(['auth','admin']);
    }



    public function index()
    {
        
        $almacen = Almacen::all();


       
        return view('almacen.index',compact('almacen'));
    }

 
    public function create()
    {
        return view('almacen.crear');
    }

 
    public function store(Request $request)
    {
        

        //Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 


         //Insertar la Información en la tabla
         $almacen = Almacen::create([
            'nombre'=>ucfirst(strtolower($request->get('nombre'))),
        ]);

        return redirect()->route('almacen.index');
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $almacen = Almacen::find($id);

        return view('almacen.editar',compact('almacen'));
    }

 
    public function update(Request $request, $id)
    {
        
        
       //Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 

         //actualizar la nueva informacion
        $almacen = Almacen::find($id);
        $almacen->nombre = ucfirst(strtolower($request->get('nombre')));
       
        $almacen->save();

        return redirect()->route('almacen.index');

    }

  
    public function destroy($id)
    {
       
       
        $almacen = Almacen::find($id);
        
        $almacen->delete();

        return redirect()->route('almacen.index');  


    }
}
