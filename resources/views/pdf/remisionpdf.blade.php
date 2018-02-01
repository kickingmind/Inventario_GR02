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


 <div align="right" style="font-size: 9px;">
 <?php
$fecha = date("d-m-Y g:i a");
echo "Remision realizado: ". $fecha;
?>
</div>


<h5 style="font-size: 20px; color:#2FCA50;" align="center">REMISIÓN DE PRODUCTOS O CONFIRMACIÓN DE SERVICIOS</h5>

<div align="left" style="font-size: 11px;">
<?php
   $calidad = "F-CMP(05)2005.1";
   echo $calidad;
 ?>
</div>

<div  style="float: left; font-size: 12px;">
 <p><strong>CODIGO :</strong> {{ $remision[0]->codigo_remision }}</p>

    <p><strong>FECHA : </strong><?php $fecha = date("d-m-Y g:i a");
    echo  $fecha;?> </p>

    <p><strong>SOLICITANTE :</strong> {{ $remision[0]->solcitante }}</p>
</div>



<div style="float: right; font-size: 12px;">
      <p><strong>AREA :</strong> {{ $remision[0]->area }}</p>
      <p><strong>COMPAÑIA :</strong> {{ $remision[0]->compania }}</p>
      <p><strong>CENTRO DE COSTO :</strong> {{ $remision[0]->cc }}</p>
</div>

<br><br><br><br>

<br><br><br>

<table>
              <thead style="background-color: #DCDCDC;">
                  <tr>
                      
                      <th>CODIGO PRODUCTO</th>
                       <th>DESCRIPCIÓN DEL PRODUCTO</th>
                       <th>CANTIDAD</th>
                       <th>OBSERVACION</th>
                       
                       
                     

                  </tr>
              </thead>
              <tbody>
                @foreach ($remision as $item)
        <tr>
            
            <td>{{ $item->codigo }}</td>
            <td>{{ $item->producto }}</td>
            <td>{{ $item->cantidad }}</td>
            <td>{{ $item->observacion }}</td>
          
            
        </tr>


     @endforeach

              </tbody>
          </table>

          <br><br><br>

        <div  style="float: left; border: 1px solid #2D2D2D!important; border-radius: 8px;padding: 5px; font-size: 10px;">
          <p><strong> Enviado por: </strong>_____________________________________</p>
        </div>

         <div  style="float: right; border: 1px solid #2D2D2D!important; border-radius: 8px; padding: 5px; font-size: 10px;">
          <p><strong> Recibido por:</strong>______________________________________</p>
        </div>

</body>
</html>