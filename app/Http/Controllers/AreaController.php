<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    
    public function index()
    {
        $areas = Area:: all();
        return view('areas.index',compact('areas'));
    }

  
    public function create()
    {
        return view('areas.crear');
    }

  
    public function store(Request $request)
    {
       
       //Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 


         //Insertar la Información en la tabla
         $area = Area::create([
            'nombre'=>ucfirst(strtolower($request->get('nombre'))),
        ]);

        return redirect()->route('areas.index');

    }


    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
       $areas = Area::find($id);

       return view('areas.editar',compact('areas'));
    }

    public function update(Request $request, $id)
    {
        //Validar la informacion ingresada

          $this->validate($request, [
            
            'nombre' => 'required',
           
        ]); 

         //actualizar la nueva informacion
        $areas = Area::find($id);
        $areas->nombre = ucfirst(strtolower($request->get('nombre')));
       
        $areas->save();

        return redirect()->route('areas.index');

    }

    public function destroy($id)
    {
        //
    }
}
