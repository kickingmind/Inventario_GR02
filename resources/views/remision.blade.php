@extends('master')

@section('contenido')

<section class="content">


<div  class="container-fluid">

 <div class="block-header">
           


<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div  class="card">
                        <div id="ajax"  class="header">
                            <h2>
                             AGREGAR PRODUCTOS
                              
                            </h2>
                             <ul class="header-dropdown m-r--5">
                               <a href="/listado_producto"><button type="button"  class="btn bg-blue waves-effect"
                           data-toggle="modal" data-target="#myModal">

                                    <i class="material-icons">add</i>
                                    <span>BUSCAR PRODUCTOS</span>
                          </button>
                          </a>

<button style="display: none;" type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#exampleModal">
  Agregar Producto Modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">LISTADO DE PRODUCTOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
               

                            <div class="table-responsive">




<table id="example" class="table table-bordered table-hover" cellspacing="0" >
              <thead>
                  <tr>
                      <th class="text-center">ID</th>
                      <th>CODIGO</th>
                       <th>NOMBRE</th>
                       <th>CANTIDAD</th>
                       <th>CATEGORIA</th>
                       
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        
      </div>
    </div>
  </div>
</div>

                        </div>
                        <div class="body">
                            <div class="row clearfix">
                        
<div align="right">
<p> 

<a href="{{ route('remision-vaciar') }}">  Borrar todos los productos</a> 

</p>
</div>
<div class="table-responsive">

@if(count($remision))

<form action="{{ route ('detalle-remision') }}" method="post">
{{ csrf_field() }}
<table id="agregarAjax" class="table table-bordered table-hover" cellspacing="0" >
			        <thead>
			            <tr>
			                <th class="text-center">ID</th>
			                <th>CODIGO</th>
			                 <th>DESCRIPCION DEL PRODUCTO O SERVICIOS</th>
			                 <th>CANTIDAD</th>
			                 <th>OBSERVACIONES</th>
			                 
			                 
			                <th class="td-actions text-right">QUITAR</th>

			            </tr>
			        </thead>
			        <tbody>
			          @foreach ($remision as $item)
        <tr >
            <td class="text-center">{{ $item->id }}</td>
            <td class="text-left">{{ $item->codigo }}</td>
            <td class="text-left">{{ $item->nombre }}</td>
            <td style="color: #FB0303;" class="text-left">
            	<input type="number" oninput="if(this.value>{{ $item->cantidad }}){ this.value={{ $item->cantidad }};  }" value="1" min="1" max="{{ $item->cantidad }}" class="form-control" name="cantidad[]">
            </td>
            <td >
            	<input type="text" class="form-control" name="observacion[]" value="">
              <input type="hidden" value="{{ $item->id }}" name="id[]">
              
            </td>
           
          
            <td class="td-actions text-right">
              <a href="{{route('remision-borrar',$item->id) }}" >
               
                <i style="color:#FF0000;" class="material-icons">clear</i>
                
                </a>
     
            </td>
        </tr>
     @endforeach

			        </tbody>
			    </table>
          <button class="btn bg-blue waves-effect"> Continuar </button>
</form>          


		 
  

@else

<h3> <span class="label label-warning" >No hay productos</span> </h3>

@endif			    

 </div>


                        </div>

                     </div>
                </div>

</div>




</section>

@endsection