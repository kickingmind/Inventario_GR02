@extends('masterOperador')

@section('contenido')

<section  class="content">
        <div  class="container-fluid">
            <div class="block-header">
               
               
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #03a9f4 !important;">
                                <b>CONTROL DE INVENTARIO COMPRAS</b>
                                
                            </h2>
                      
                        </div>
                        <div class="body">
                            <div class="row">
                                <div  class="hvr-grow-shadow col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                    	<a href="{{ route('operador.listarProductos') }}"><img src="{{ ('assets/images/Productos3.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">Agregar productos</h3>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="hvr-grow-shadow col-sm-6 col-md-3">
                                     <div class="thumbnail">
                                        <a href="#"><img src="{{ ('assets/images/remision.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">Remision Salida</h3>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="hvr-grow-shadow col-sm-6 col-md-3">
                                     <div class="thumbnail">
                                        <a href="#"><img src="{{ ('assets/images/stock.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">Existencia Stock</h3>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="hvr-grow-shadow col-sm-6 col-md-3">
                                     <div class="thumbnail">
                                        <a href="#"><img src="{{ ('assets/images/qr.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">Consultar e ingresar Productos</h3>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
 </section>


@endsection