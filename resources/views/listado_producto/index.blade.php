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
                                <div align="center"><b>LISTADO DE PRODUCTOS</b></div>

                            </h2>

                             <ul class="header-dropdown m-r--5">
                        

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
			                <th class="td-actions text-right">AGREGAR</th>

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
              <a href="{{ route('agregar-remision',$producto->id)}}" >
                
                 <i class="material-icons">queue</i>
                 
                </a>
              
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
