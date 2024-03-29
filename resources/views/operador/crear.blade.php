@extends('masterOperador')

@section('contenido')

<section class="content">


<div class="container-fluid">

 <div class="block-header">
           


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                NUEVO PRODUCTO
                              
                            </h2>
                      
                        </div>
                        <div class="body">
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
                                               
                                   {!! Form::open(['route' => 'operador.store','enctype'=>'multipart/form-data']) !!}

                                       <!--CODIGO -->
                                       <div class="form-group form-float">
                                                         <div class="form-line">
                                                            {!! Form::text('codigo', null, array(
                                                                    'class'=>'form-control',
                                                                    'required'=>'required',
                                                                                                                            
                                                                )) 
                                                            !!}
                                                           {{ Form::label('codigo','Codigo', array('class' => 'form-label')) }}
                                                        </div>
                                                    </div>
                                      <!--/CODIGO -->

                                        
                                        <!--NOMBRE -->
                                       <div class="form-group form-float">
                                                         <div class="form-line">
                                                            {!! Form::text('nombre', null, array(
                                                                    'class'=>'form-control',
                                                                    'required'=>'required',
                                                                                                                            
                                                                )) 
                                                            !!}
                                                           {{ Form::label('nombre','Nombre', array('class' => 'form-label')) }}
                                                        </div>
                                                    </div>
                                      <!--/NOMBRE -->                                                

                                                  <!--CANTIDAD -->
                                                   <div class="form-group form-float">
                                                     <div class="form-line">
                                                        {!! Form::number('cantidad', null, array(
                                                                'class'=>'form-control',
                                                                
                                                                'min' => '1',
                                                                
                                                            )) 
                                                        !!}
                                                       {{ Form::label('cantidad','Cantidad', array('class' => 'form-label')) }}
                                                    </div>
                                                </div>
                                                  <!--/CANTIDAD -->


                                                    <div class="form-group form-float">
                                                        <label for="select" >Categoria</label>
                                                        {!! Form::select('idcategoria', $categorias, null, ['class' => 'form-control']) !!}
                                                    </div>
                                                   

                                                   <!--ALMACEN -->
                                                    <div class="form-group form-float">
                                                        <label for="select" >Almacen</label>
                                                        {!! Form::select('almacen', $almacen, null, ['class' => 'form-control']) !!}
                                                    </div>
                                                     <!--/ALMACEN -->
                                                    

                                 

                                {!! Form::submit('Guardar', array('class'=>'btn btn-primary'))!!}
                                
                              
                               
                                </div>

                                 <div class="col-sm-6">
                                  
                                  {!!Form::file('archivo', ['class' => 'form-control','id'=>'upload']);!!}
                                  <br>
                                <img id="image" src="#" width="200" height="250" style="border: none;">    
                                </div> 

                                  {!! Form::close() !!}
                                <hr>
                            
                            </div>
                        </div>
                    </div>
                </div>

</div>


<!-- Scritp para previsualizar imagen -->
<script type="text/javascript">
    
document.getElementById("upload").onchange = function() {
  var reader = new FileReader(); //instanciamos el objeto de la api FileReader

  reader.onload = function(e) {
    //

    document.getElementById("image").src = e.target.result;
  };

  // lea el archivo de imagen como una URL de datos.
  reader.readAsDataURL(this.files[0]);
};
</script>

</section>

@endsection
