<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movimiento;
use App\Producto;
use DB;
use Auth;



class GraficoController extends Controller
{
    
    /*NO LA TIENE RESTRINGINA CUALQUIERA PUEDE INGRESAR*/


    function graficoPMSPM (Request $request)

    {
        
        $mes = $request->mes; 
/* 
SQLSTATE[42000]: Syntax error or access violation: 1055  
cuando se trata de un error de acceso es xq no tienes un permiso para acceder a ciertas funciones de mysql , a pesar que si las tienes en phpmyadmin en laravel hay ciertas consultas que no puedes hacer por seguridad, entonces para eso es el strict, en el archivo config/database.php puedes crear multiples conexiones 
*/

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
        //->offset(0)
        ->limit(5)

       ->get();


       return view('grafico.index',compact('prodmes','mes'));

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
          
          return view('grafico.productopm',compact('prodpp'));
    }
}

/*

SELECT p.codigo as 'codigo',  p.nombre as 'nombre', SUM(m.cantidad) as 'cantidad', m.created_at as 'fecha'

FROM productos p
LEFT JOIN movimiento m ON p.id = m.id_productos 


WHERE YEAR(m.created_at)= 2018 AND p.codigo ='774896555' 

GROUP BY MONTH(m.created_at) 
ORDER BY m.created_at  ASC



*/