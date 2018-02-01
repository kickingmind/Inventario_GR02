<?php



Route::get('/', function () {
    return view('index');
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

Route::get('/operador', 'OperadorController@listarProductos');
route::get('operadorReporte',['as'=>'opereporte','uses'=>'OperadorController@reporteProductos']);

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



//ROUTAS PARA CONSULTAR PRODUCTOS Y REMISIONES
route::get('consultar/productos',['as'=>'consultaProductos','uses'=>'ReporteController@indexProductos']);
route::get('consultar/remision',['as'=>'consultaRemision','uses'=>'ReporteController@indexRemision']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////


