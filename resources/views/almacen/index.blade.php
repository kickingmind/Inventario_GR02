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
                                <b>ALMACEN</b>

                            </h2>

                             <ul class="header-dropdown m-r--5">
                        <a href="{{ route('almacen.create') }}"><button type="button" class="btn bg-blue waves-effect"
                           data-toggle="modal" data-target="#myModal">

                                    <i class="material-icons">add</i>
                                    <span>NUEVO ALMACEN</span>
                          </button>
                          </a>
                        
                  

                        </div>

                        <div class="body">



                            <div class="table-responsive">




          <table id="example" class="table table-bordered table-hover" cellspacing="0" >
			        <thead>
			            <tr>
			                <th class="text-center">ID</th>
			                <th>NOMBRE</th>
			              
			                <th class="td-actions text-right">EDITAR/ELIMINAR</th>

			            </tr>
			        </thead>
			        <tbody>
			          @foreach ($almacen as $item)
        <tr>
            <td class="text-center">{{ $item->id }}</td>
          
            <td class="text-left">{{ $item->nombre }}</td>
          
            <td class="td-actions text-right">
              <a href="{{ route('almacen.edit',$item->id) }}" >
                <button>
                 <i style="color:#60B96B; " class="material-icons" >mode_edit</i>
                 </button>
                </a>
               
             <!-- <?php /*
                {!! Form::open(['route' => ['almacen.destroy', $item->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Deseas eliminar esta categoria ?')">
                 <i style="color:#F12828;"  class="material-icons">delete_forever</i>
                </button>
              {!! Form::close() !!} */?> --> 

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
