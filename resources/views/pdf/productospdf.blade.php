<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  

  <title>Reporte Productos</title>
</head>

<style>

table{
  font-size: 13px;
  width: 100%;
}
table, th, td {
    border: 1px solid #dddddd;
    border-collapse: collapse;
    
}
th, td {
    padding: 5px;
}
th, td {
    text-align: center;
}

/*tr:nth-child(even) {
    background-color: #F6F6F6;
}*/

</style>

<body>

  <div align="left">
  <img style="width: 200px; right: 200px" src="{{ ('assets/images/jardines.png') }}">
  
</div>


 <div align="right" style="font-size: 10px;">
 <?php
$fecha = date("d-m-Y g:i a");
echo "Reporte realizado: ". $fecha;
?>
</div>

 
<br><br>

 <p style="font-size: 25px;" align="center">Existencias de Productos en <?php 
  if ( $condicion=="todosproductos") {
    echo "bodega";
  }else
  
   echo $productos[0]->almacen;
  ?>
    
</p>
<br>

<br>
<table>
              <thead style="background-color: #DCDCDC;">
                  <tr>
                      
                      <th>CODIGO</th>
                       <th>NOMBRE PRODUCTO</th>
                       <th>CANTIDAD</th>
                       <th>CATEGORIA</th>
                       <th>ALMACEN</th>
                       
                     

                  </tr>
              </thead>
              <tbody>
                @foreach ($productos as $producto)
        <tr>
            
            <td>{{ $producto->codigo }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>{{ $producto->nombre_categoria }}</td>
            <td>{{ $producto->almacen }}</td>
            
        </tr>
     @endforeach

              </tbody>
          </table>








</body>
</html>