<?php



Route::get('/', function () {
    return view('index');
});

Route::get('/errors', function () {
    return view('errors.500');
});

//route::prefix('admin')->middleware('auth')->group(function(){


//Route::resource('productos', 'ProductosController');
	
//});

Route::resource('perfiles', 'PerfilesController');

Route::resource('productos', 'ProductosController');

Route::resource('aplicacion', 'AplicacionController');
   
  // return Auth::user()->name;


Route::resource('operador', 'OperadorController');

Route::resource('almacen', 'AlmacenController');

Route::resource('compania', 'CompaniaController');

Route::resource('areas', 'AreaController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



Route::get('/listado_producto', 'Listado_ProductosController@index');
//Administrador
//Route::group(['middleware' => ['Auth', 'admin']], function () {
//});

//ROUTAS PARA CATEGORIA DE PRODUCTOS
Route::get('/categoria_productos',['as'=>'categProductos','uses'=>'CategProductoController@index']);
Route::get('/categoria_productos/crear',['as'=>'categProductosCrear','uses'=>'CategProductoController@crear']);
Route::get('/categoria_productos/{id}',['as'=>'categProductosEditar','uses'=>'CategProductoController@editar']);
Route::post('/categoria_productos/guardar',['as'=>'categProductosGuardar','uses'=>'CategProductoController@guardar']);
Route::PUT('/categoria_productos/actualizar{id}',['as'=>'categProductosActualizar','uses'=>'CategProductoController@actualizar']);
Route::delete('/categoria_productos/eliminar/{id}',['as'=>'categProductosEliminar','uses'=>'CategProductoController@eliminar']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////


//Routas para la remision de saalidas
Route::get('remision',['as'=>'remision','uses'=>'Remision_SalidaController@show']);
Route::get('remision/agregar/{id}',['as'=>'agregar-remision','uses'=>'Remision_SalidaController@add']);
Route::get('remision/borrar/{id}',['as'=>'remision-borrar','uses'=>'Remision_SalidaController@delete']);
Route::get('remision/vaciar',['as'=>'remision-vaciar','uses'=>'Remision_SalidaController@trash']);
Route::post('remision/detalle_remision',['as'=>'detalle-remision','uses'=>'Remision_SalidaController@detalleRemision']);
Route::post('remision/guardar',['as'=>'guardar-remision','uses'=>'Remision_SalidaController@guardar']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////

//ROUTAS PARA GENERAR PDF
route::get('reporte/productos_pdf',['as'=>'productospdf','uses'=>'PdfController@productospdf']);
route::post('reporte/productos_almacen',['as'=>'almacenpdf','uses'=>'PdfController@productos_almacenpdf']);
route::get('reporte/remision/{id}',['as'=>'remisionpdf','uses'=>'PdfController@remisionpdf']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////

//ROUTAS PARA GENERAR REPORTES GRAFICOS
route::post('reporte/grafico',['as'=>'reportegrafico','uses'=>'GraficoController@graficoPMSPM']);
route::get('reporte/graficoProducto/{codigo}',['as'=>'reportegraficoProducto','uses'=>'GraficoController@graficoPP']);
////////////////////////////////////////////////////////////////////////////////////////////////


//ROUTAS PARA CONSULTAR PRODUCTOS Y REMISIONES
route::get('consultar/productos',['as'=>'consultaProductos','uses'=>'ReporteController@indexProductos']);
route::get('consultar/remision',['as'=>'consultaRemision','uses'=>'ReporteController@indexRemision']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////

//ROUTAS PARA OPERADOR
Route::get('/operador', 'OperadorController@listarProductos');
route::get('operadorReporte',['as'=>'opereporte','uses'=>'OperadorController@reporteProductos']);
route::get('operador/consulta/remision',['as'=>'operconremision','uses'=>'OperadorController@indexRemision']);
route::post('operador/grafico',['as'=>'opergrafico','uses'=>'OperadorController@graficoPMSPM']);
route::get('operador/graficoProducto/{codigo}',['as'=>'opergrafproducto','uses'=>'OperadorController@graficoPP']);


#######################################################################
//ROUTAS PARA REALIZAR LA ENTRADA DEL PRODUCTO

Route::get('entrada',['as'=>'entrada','uses'=>'Entrada_productosController@show']);
Route::get('entrada/agregar/{id}',['as'=>'agregar-entrada','uses'=>'Entrada_productosController@add']);
Route::get('entrada/borrar/{id}',['as'=>'entrada-borrar','uses'=>'Entrada_productosController@delete']);
Route::get('entrada/vaciar',['as'=>'entrada-vaciar','uses'=>'Entrada_productosController@trash']);
Route::post('entrada/detalle_entrada',['as'=>'detalle-entrada','uses'=>'Entrada_productosController@detalleRemision']);
Route::post('entrada/guardar',['as'=>'guardar-entrada','uses'=>'Entrada_productosController@guardar']);
