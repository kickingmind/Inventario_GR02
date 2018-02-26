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
                                <b>CONSULTAR REMISION DE PRODUCTOS</b>

                            </h2>

                        </div>

                        <div class="body">



                            <div class="table-responsive">

<!-- <input type="text" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"> -->


  <table id="example" class="table table-bordered table-hover" cellspacing="0" >
              <thead>
                  <tr>
                      <th class="text-center">CODIGO DE REMISION</th>
                      <th class="text-center">FECHA</th>
                       <th class="text-center">SOLICITANTE</th>
                      <th class="text-center">DETALLES</th>

                  </tr>
              </thead>
              <tbody>
                @foreach ($remision as $item)
        <tr>
          
            <th class="text-center">{{ $item->codigo }}</th>
            <th class="text-center">{{ $item->created_at }}</th>
            <th class="text-center">{{ $item->solicitante }}</th>
            <th class="text-center">
              <a href="{{ route('remisionpdf',$item->codigo)}}">Ver</a>
           </th>
<!-- ->format('F j, Y, g:i a') -->
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
