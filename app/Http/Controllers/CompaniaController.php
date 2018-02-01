<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compania;

class CompaniaController extends Controller
{
    
     public function __construct()
    {
       $this->middleware(['auth','admin']);
    }


   
    public function index()
    {
       

       $compania = Compania::all();


       return view('compania.index',compact('compania'));


    }

    

    public function create()
    {
        return view('compania.crear');
    }

 


    public function store(Request $request)
    {
        //Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 


         //Insertar la Información en la tabla
         $compania = Compania::create([
            'nombre'=>ucfirst(strtolower($request->get('nombre'))),
        ]);

        return redirect()->route('compania.index');
    }




    public function show($id)
    {
        //
    }

   


    public function edit($id)
    {
        
        $compania = Compania::find($id);

        return view('compania.editar',compact('compania'));
    }

   


    public function update(Request $request, $id)
    {
         //Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 

         //actualizar la nueva informacion
        $compania = Compania::find($id);
        $compania->nombre = ucfirst(strtolower($request->get('nombre')));
       
        $compania->save();

        return redirect()->route('compania.index');
    }




    public function destroy($id)
    {
        //
    }
}
