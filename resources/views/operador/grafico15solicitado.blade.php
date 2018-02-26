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
                                <b>LOS 15 PRODUCTOS MAS SOLICITADOS POR MES</b>

                            </h2>          
                  

                        </div>

                        <div class="body">





<!-- GRAFICO CON GOOGLE-->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
         
          ['Task', 'horas por dias'],
          @foreach ($prodmes as $item)
          ['{{ $item->nombre }}',     {{ $item->cantidad }}],
         @endforeach
        ]);
        
        var options = {
          title: '15 Productos mas solicitados en el mes de <?php 
          
          switch ($mes) {
		    case "1":
		        echo "Enero ";
		        break;
		    case "2":
		        echo "Febrero";
		        break;
		    case "3":
		        echo "Marzo ";
		        break;
		    case "4":
		        echo "Abril ";
		        break;
		    case "5":
		        echo "Mayo ";
		        break;
		    case "6":
		        echo "Junio ";
		        break;
		    case "7":
		        echo "Julio ";
		        break;
		    case "8":
		        echo "Agosto ";
		        break;
		    case "9":
		        echo "Septiembre ";
		        break;
		    case "10":
		        echo "Octubre ";
		        break;
		    case "11":
		        echo "Nomviembre ";
		        break; 
		    case "12":
		        echo "Diciembre ";
		        break;                                  
         }

          ?> 2018',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  
  
  <div id="piechart_3d" style="width: 900px; height: 400px;"></div>
  


                        </div>
                    </div>
                </div>
            </div>
          

        </div>
    </section> 
   

@endsection
