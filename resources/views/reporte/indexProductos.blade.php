@extends('master')

@section('contenido')

<section class="content">


<div class="container-fluid">

 <div class="block-header">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
          <div class="header">
              <h2>
                  CONSULTAR PRODUCTOS Y GENERAR REPORTES EN PDF
                
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
                                  {!! Form::select('almacen', $almacen, null, ['class' => 'form-control']) !!}
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
                 
               
              </div>
          </div>
      </div>
  </div>
</div>



</section>

@endsection
