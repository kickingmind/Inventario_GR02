@extends('master')

@section('contenido')

<section class="content">


<div class="container-fluid">

 <div class="block-header">
           


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ENTRADA DE PRODUCTO
                              
                            </h2>
                             <ul class="header-dropdown m-r--5">
                             
                        <?php 
                        $fecha= date ("Y-m-d");
                        ?>
                        </div>
                        <div class="body">
  <form action="{{ route ('guardar-entrada') }}" method="post">
                                        {{ csrf_field() }}                          
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                  
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif                                         
                                               
                                
                                          
             <!--CODIGO FACTURA-->
             <br>
             <div class="form-group form-float">
                               <div class="form-line">
                                  {!! Form::text('codigo_factura',null, array(
                                          'class'=>'form-control',
                                          
                                                                                                  
                                      )) 
                                  !!}
                                 {{ Form::label('codigo_factura','Codigo factura', array('class' => 'form-label')) }}
                              </div>
                          </div>
            <!--/CODIGO FACTURA -->
                                            
                  <br>
                  <!--FECHA -->
                 <div class="form-group form-float">
                                   <div class="form-line">
                                      {!! Form::text('fecha', $fecha, array(
                                              'class'=>'form-control',
                                              
                                                                                                      
                                          )) 
                                      !!}
                                     {{ Form::label('fecha','Fecha', array('class' => 'form-label')) }}
                                  </div>
                              </div>
                <!--/FECHA -->                                                

              <!--SOLICITANTE -->
                <div class="form-group form-float">
                    <label for="select" >Proveedor</label>
                    {!! Form::select('solcitante', $solicitante, null, ['class' => 'form-control']) !!}
                </div>
              <!--/SOLICITANTE -->                                                                         

                                </div>

                             <div class="col-sm-6">
                               <!--COMPAÑIA -->
                                <div class="form-group form-float">
                                    <label for="select" >Compañia</label>
                                    {!! Form::select('idcompania', $compania, null, ['class' => 'form-control']) !!}
                                </div>
                              <!--/COMPAÑIA -->
                              
                                <!--AREAS prueba-->
                                <div class="form-group form-float">
                                    <label for="select" >Area</label>
                                    {!! Form::select('idarea', $area,null, ['class' => 'form-control']) !!}
                                </div>
                              <!--/AREAS -->

                            <!--/CENTRO DE COSTO -->
                                <div class="form-group form-float">
                                     <div class="form-line">
                                        {!! Form::text('centroCosto', null, array(
                                                'class'=>'form-control',
                                                
                                                                                                        
                                            )) 
                                        !!}
                                       {{ Form::label('centroCosto','Centro de Costo', array('class' => 'form-label')) }}
                                    </div>
                                </div>
                            <!--/CENTRO DE COSTO -->
                            </div> 

                                  
                                <hr>
                            
                            </div>

<div class="table-responsive">

@if(count($remision))

<?php 
echo (count($remision));


?>


<table  class="table table-bordered table-hover" cellspacing="0" >
			        <thead>
			            <tr>
                      <th class="text-center">N°</th>
			                
			                <th>CODIGO</th>
			                 <th>DESCRIPCION DEL PRODUCTO O SERVICIOS</th>
			                 <th>CANTIDAD</th>
			                 <th>OBSERVACIONES</th>
			                 
			            </tr>
			        </thead>
			        <tbody>
              <?php $i=1; ?>
			          @foreach ($remision as $item)
                
        <tr >
            <td class="text-center"> <?php echo $i; ?> </td>
            
            <td class="text-left">{{ $item->codigo }}</td>
            <td class="text-left">{{ $item->nombre }}</td>
            <td style="color: #FB0303;" class="text-left">
            	<input disabled="true" type="number" min="1" max="{{ $item->cantidad }}" value="{{ $item->cantidadSelect }}" class="form-control" >

              <input  type="hidden" min="1" max="{{ $item->cantidad }}" value="{{ $item->cantidadSelect }}" class="form-control" name="cantidad[{{ $item->id }}]" >
            </td>
            <td >
            	<input type="hidden" class="form-control" name="observacion[{{ $item->id }}]" value="{{ $item->observacion  }}" >
              <input disabled="true" type="text" class="form-control" value="{{ $item->observacion  }}" >
              <!--si pones un input disabled este no manda los datos por esoio hice eso -->
            </td>
       
        </tr>
        <?php $i++ ;?>
     @endforeach

			        </tbody>
			    </table>




@else



<h3> <span class="label label-warning" >No hay productos</span> </h3>

@endif   	



 </div>


     {!! Form::submit('Guardar', array('class'=>'btn btn-primary'))!!}
           
{!! Form::close() !!}


                        </div>

                     </div>
                </div>

</div>




</section>

@endsection