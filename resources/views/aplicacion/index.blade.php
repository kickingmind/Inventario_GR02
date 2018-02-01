

@extends('master')

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
                                    	<a href="/productos/create"><img src="{{ ('assets/images/Productos3.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">AGREGAR NUEVO PRODUCTOS</h3>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="hvr-grow-shadow col-sm-6 col-md-3">
                                     <div class="thumbnail">
                                        <a href="{{ route('remision') }}"><img src="{{ ('assets/images/remision.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">REALIZAR REMISION DE PRODUCTOS</h3>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="hvr-grow-shadow col-sm-6 col-md-3">
                                     <div class="thumbnail">
                                        <a href="{{ route('consultaProductos') }}"><img src="{{ ('assets/images/stock.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">REPORTES DE PRODUCTOS</h3>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="hvr-grow-shadow col-sm-6 col-md-3">
                                     <div class="thumbnail">
                                        <a href="{{ route('productos.index') }}"><img src="{{ ('assets/images/Productos4.png') }}"></a>
                                        <div class="caption">
                                            <h3 align="center">TODOS LOS PRODUCTOS</h3>
                                          
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