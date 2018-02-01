@extends('masterOperador')

@section('contenido')


<section class="content">
        <div class="container-fluid">



           <!-- Basic Examples -->
            <div class="block-header">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       <div class="header">
                            <h2 style="color: #03a9f4 !important;">
                                <b>PRODUCTOS</b>

                            </h2>

                             <ul class="header-dropdown m-r--5">
                          <a href="{{ route('operador.create') }}"><button type="button" class="btn bg-blue waves-effect"
                           data-toggle="modal" data-target="#myModal">

                                    <i class="material-icons">add</i>
                                    <span>NUEVO PRODUCTOS</span>
                          </button>
                          </a>
                        
                  

                        </div>

                        <div class="body">



                            <div class="table-responsive">




<table id="example" class="table table-bordered table-hover" cellspacing="0" >
			        <thead>
			            <tr>
			                <th class="text-center">ID</th>
			                <th>CODIGO</th>
			                 <th>NOMBRE</th>
			                 <th>CANTIDAD</th>
			                 <th>CATEGORIA</th>
			                 <th>ALMACEN</th>
			                 <th>IMAGEN</th>
			               

			            </tr>
			        </thead>
			        <tbody>
			          @foreach ($productoss as $producto)
        <tr class="perfil{{$producto->id}}">
            <td class="text-center">{{ $producto->id }}</td>
            <td class="text-left">{{ $producto->codigo }}</td>
            <td class="text-left">{{ $producto->nombre }}</td>
            <td style="color: #FB0303;" class="text-left">{{ $producto->cantidad }}</td>
            <td class="text-left">{{ $producto->nombre_categoria }}</td>
            <td class="text-left">{{ $producto->almacen }}</td>
            <td class="text-left"><img src="{{ asset('imageProducto/'.$producto->url_imagen.'') }}" width="50" height="80"></td>
        
        </tr>
     @endforeach

			        </tbody>
			    </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--$this->items[$key] #END# Basic Examples -->

        </div>
    </section>
   

@endsection
