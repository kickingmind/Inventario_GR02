@extends('master')

@section('contenido')

<section class="content">


<div class="container-fluid">

 <div class="block-header">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
          <div class="header">
              <h2>
                  CONSULTAR PRODUCTOS Y GENERAR REPORTES
                
              </h2>
        
          </div>
          <div class="body">
              <div class="row clearfix">
                  <div class="col-sm-12">
                    
                      <div align="center">
                      

                      @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif 

                        <!--CONSULTAR TODOS LOS PROUDUCTOS EN BODEGA --> 
                         
                    
                         <div class="form-group form-float">

                            <label for="select" >CONSULTAR TODOS LOS PRODUCTOS EN BODEGA </label>
                             <br>
                             <a href="{{ route('productospdf') }}"><button class="btn btn-primary">Generar reporte en PDF</button></a>            

                        </div>
                                   
                      
                          <hr>     
                       </div><!--/fin del center -->  
                   </div>                     
                <!--///////////////////////////////////////////////////////////////////////////// -->           
            <div class="row clearfix">
             <div class="col-sm-4 col-sm-offset-4"> 
             <div align="center">   
              <form action="{{ route ('almacenpdf') }}" method="post">
                                        {{ csrf_field() }} 
                       <!--CONSULTAR POR Almacen -->
                                                  
                              <div class="form-group form-float">
                                  <label for="select" >CONSULTAR PRODUCTOS POR ALMACEN</label>
                                  {!! Form::select('almacen', $almacen, ['class' => 'form-control']) !!}
                                  <br>
                                  <br>
                               {!! Form::submit('Generar reporte en PDF', array('class'=>'btn btn-primary'))!!}
                              </div>   
                                   
                      <!--/CONSULTAR POR Almacen -->
                         
                             
               </form> 
            </div>
            
           </div> 
              <hr>
            



           </div>      
                <hr> 

         <div class="row clearfix">
           <div class="col-sm-4 col-sm-offset-4">        
            <div align="center"> 

           <form action="{{ route ('reportegrafico') }}" method="post">
                                        {{ csrf_field() }} 
                       <!--CONSULTA los 15 productos mas solicitados -->
                                                  
                              <div class="form-group form-float">
                                  <label for="select" >EN GRAFICAS, LOS 15 PRODUCTOS MAS SOLICITADOS POR MES</label>
                                  {!! Form::select('mes', array('1'=>'Enero',
                                  '2'=>'Febrero',
                                  '3'=>'Marzo',
                                  '4'=>'Abril',
                                  '5'=>'Mayo',
                                  '6'=>'Junio',
                                  '7'=>'Julio',
                                  '8'=>'Agosto',
                                  '9'=>'Septiembre',
                                  '10'=>'Octubre',
                                  '11'=>'Noviembre',
                                  '12'=>'Diciembre'

                                  ), ['class' => 'form-control']) !!}
                                  <br>
                                  <br>
                               {!! Form::submit('Generar reporte en GRAFICO', array('class'=>'btn btn-primary'))!!}
                              </div>   
                                   
                      <!--/CONSULTAR POR Almacen -->
                         
                             
               </form>  

               <hr>
               
                <br>
                                         

               
              </div>  
            </div>
          </div>

    <!--TABLA DE CONSULTAR POR PRODUCTOS -->      
     <div class="col-sm-12">
       <label for="select" >CONSULTAR PRODUCTOS POR MES</label>
      <br>
       <br>
      <br>

   <div class="table-responsive">




<table id="example" class="table table-bordered table-hover" cellspacing="0" >
              <thead>
                  <tr>
                      
                      <th>CODIGO</th>
                       <th>NOMBRE</th>
                       
                       <th>CATEGORIA</th>
                       <th>ALMACEN</th>
                       <th>IMAGEN</th>
                      <th class="td-actions text-right">CONSULTAR</th>

                  </tr>
              </thead>
              <tbody>
                @foreach ($productoss as $producto)
        <tr >
            
            <td class="text-left">{{ $producto->codigo }}</td>
            <td class="text-left">{{ $producto->nombre }}</td>
            
            <td class="text-left">{{ $producto->nombre_categoria }}</td>
            <td class="text-left">{{ $producto->almacen }}</td>
            <td class="text-left"><img src="{{ asset('imageProducto/'.$producto->url_imagen.'') }}" width="50" height="80"></td>
            <td class="td-actions text-right">
              <a href="{{ route('productos.edit',$producto->id)}}" >
                <button class="btn btn-primary btn-sm">
                 <i class="material-icons">trending_up</i>
                 Consultar
                 </button>
                </a>
               

            </td>
        </tr>
     @endforeach

              </tbody>
          </table>

                            </div>
      


    </div>
    <!--TABLA DE CONSULTAR POR PRODUCTOS --> 






              </div><!--/FIN DE row clearfix" -->
          </div>
      </div>
  </div>
</div>



</section>

@endsection
