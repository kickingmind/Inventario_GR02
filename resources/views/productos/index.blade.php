@extends('master')

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
                          <a href="{{ route('productos.create') }}"><button type="button" class="btn bg-blue waves-effect"
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
			                <th class="td-actions text-right">OPCIONES</th>

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
            <td class="td-actions text-right">
              <a href="{{ route('productos.edit',$producto->id)}}" >
                <button>
                 <i style="color:#60B96B; " class="material-icons" >mode_edit</i>
                 </button>
                </a>
               
            
               {!! Form::open(['route' => ['productos.destroy', $producto->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Este Producto?')">
                 <i style="color:#F12828;"  class="material-icons">delete_forever</i>
                </button>
              {!! Form::close() !!}

            </td>
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
