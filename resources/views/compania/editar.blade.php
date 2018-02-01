@extends('master')

@section('contenido')

<section class="content">


<div class="container-fluid">

 <div class="block-header">
           


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ACTUALIZAR COMPAÑIA
                              
                            </h2>
                      
                        </div>
                        <div  class="body">
                            <div class="row clearfix">

                              <div align="center">
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
                                               
                                                                                 
                                    
 {!! Form::model($compania, ['route' => ['compania.update', $compania->id], 'method' => 'PUT']) !!}
         {{ csrf_field() }}
                                        
                                        <!--NOMBRE -->
                                       <div class="form-group form-float">
                                                         <div class="form-line">
                                                            {!! Form::text('nombre', $compania->nombre, array(
                                                                    'class'=>'form-control',
                                                                    'required'=>'required',
                                                                                                                            
                                                                )) 
                                                            !!}
                                                           {{ Form::label('nombre','Nombre de la compania', array('class' => 'form-label')) }}
                                                        </div>
                                                    </div>
                                      <!--/NOMBRE -->                                                                                     

                                 

                                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary'))!!}
                                
                              
                               
                                </div>


                                  {!! Form::close() !!}
                              
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>



</section>

@endsection