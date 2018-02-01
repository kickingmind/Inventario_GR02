@extends('master')

@section('contenido')
<script type="text/javascript">
  var RutaPerfiles="{{route('perfiles.store')}}";
</script>
<section class="content">
        <div class="container-fluid">



           <!-- Basic Examples -->
            <div class="block-header">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       <div class="header">
                            <h2 style="color: #03a9f4 !important;">
                                <b>PERFILES</b>

                            </h2>

                             <ul class="header-dropdown m-r--5">
                          <button type="button" class="btn bg-blue waves-effect"
                           data-toggle="modal" data-target="#myModal">

                                    <i class="material-icons">add</i>
                                    <span>NUEVO PERFIL</span>
                          </button>

                          
                  

                        </div>

                        <div class="body">



                            <div class="table-responsive">




<table id="example" class="table table-bordered table-hover" cellspacing="0" >
			        <thead>
			            <tr>
			                <th class="text-center">ID</th>
			                <th>NOMBRE</th>
			                <th class="td-actions text-right">OPCIONES</th>

			            </tr>
			        </thead>
			        <tbody>
			          @foreach ($perfiles as $perfil)
        <tr class="perfil{{$perfil->id}}">
            <td class="text-center">{{ $perfil->id }}</td>
            <td class="perfil-nombre{{ $perfil->id }}">{{ $perfil->nombre }}</td>


            <td class="td-actions text-right">
                 <a style="cursor: pointer;" data-id="{{$perfil->id}}" class="editar-perfil" data-url2="{{ route('perfiles.update',$perfil->id) }}"  data-url="{{ route('perfiles.show',$perfil->id) }}" data-toggle="modal" data-target="#myModalEditar" >
                 <i style="color:#60B96B; " class="material-icons" >mode_edit</i>
                </a>

                <a style="cursor: pointer;" class="perfil-delete" data-class=".perfil{{$perfil->id}}" data-url="{{ route('perfiles.destroy',$perfil->id) }}">
                <i style="color:#F12828;"  class="material-icons">delete_forever</i>
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
            <!-- #END# Basic Examples -->

        </div>
    </section>


<!-- MODAL FORMULARRIO!!!! -->
  <div  class="modal fade" id="myModal" role="dialog">
    <div style="border-radius: 15px;" class="modal-dialog modal-sm">
      <div class="modal-content">


<div class="modal-body">
   <div class="panel panel-default">
			 <div align="center" style="color: #FFFFFF !important; background:#03a9f4; padding: 5px;"           class="panel-heading "><b>NUEVO PERFIL</b></div>

          <div class="panel-body">
			    <br>

             @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Por favor corrige los siguentes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <!-- BODY-MODAL -->

    <!-- FORMULARIO!!!!!!!!! -->
        {!! Form::open(['id'=>'formPerfiles' ]) !!}


           <div id="NombreGroup" class="form-group">
                <label for="perfil">Nuevo perfil</label>
                   <div  class="form-line">
                    {!! form::text('nombre',null,array (
                           'class'=>'form-control',
                           'id'=>'nombre',
                           'placeholder'=>'Perfil'
                           ))

                     !!}
                  </div>
            <label id="NombreControl" class="error" for="nombre" style="display: none;"></label>
           </div>
          <!-- FIN-BODY-MODAL -->
         </div>


            <!-- FOOTER-MODAL -->
           <div class="panel-footer">


          {!! link_to('#','Guardar', ['id'=>'guardar','class'=>'btn btn-default m-t-15 waves-effect left'  ]) !!}

            <button  class="btn btn-default m-t-15 waves-effect right" data-dismiss="modal">SALIR</button>

          </div>
          <!-- FiN-FOOTER-MODAL -->
    {!! Form::close() !!}
</div>
</div>


      </div>
    </div>
  </div>
<!-- END Modal -->



<!-- MODAL FORMULARRIO EDITAR!!!! -->
  <div  class="modal fade" id="myModalEditar" role="dialog">
    <div style="border-radius: 15px;" class="modal-dialog modal-sm">
      <div class="modal-content">


<div class="modal-body">
   <div class="panel panel-default">
       <div align="center" style="color: #FFFFFF !important; background:#03a9f4; padding: 5px;"           class="panel-heading "><b>EDITAR PERFIL</b></div>

          <div class="panel-body">
          <br>

             @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Por favor corrige los siguentes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <!-- BODY-MODAL -->

    <!-- FORMULARIO!!!!!!!!! -->
        {!! Form::open(['id'=>'formPerfiles2' ]) !!}


           <div id="NombreGroup" class="form-group">
                <label for="perfil">Editar perfil</label>
                   <div  class="form-line">
                    {!! form::text('nombre',null,array (
                           'class'=>'form-control',
                           'id'=>'editar_perfil',
                           'placeholder'=>''
                           ))

                     !!}
                  </div>
            <label id="NombreControl_editar" class="error" for="nombre" style="display: none;"></label>
          </div>
          <!-- FIN-BODY-MODAL -->
         </div>


            <!-- FOOTER-MODAL -->
           <div class="panel-footer">


          {!! link_to('#','Guardar', ['data-url'=>route('perfiles.update',$perfil->id),'id'=>'editar_perfil_save','class'=>'btn btn-default m-t-15 waves-effect left'  ]) !!}

            <button  class="btn btn-default m-t-15 waves-effect right" data-dismiss="modal">SALIR</button>

          </div>
          <!-- FiN-FOOTER-MODAL -->
    {!! Form::close() !!}
</div>
</div>


      </div>
    </div>
  </div>
<!-- END Modal -->



@endsection
