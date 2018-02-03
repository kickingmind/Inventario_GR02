<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;





class GraficoController extends Controller
{
    
    function graficoPMSPM (Request $request)

    {
        
        $mes = $request->get('mes');
        return view('grafico.index',compact('mes'));
    }
}
