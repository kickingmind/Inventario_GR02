
@extends('masterOperador')

@section('contenido')

<section class="content">


<div class="container-fluid">

 <div class="block-header">
           


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="header">
                            <h2 style="color: #03a9f4 !important;">
                                
                                  
                                  <?php if (isset($prodpp[0]->nombre)) {
                                    echo "<b>SALIDA DE PRODUCTO POR MES O POR DIAS</b>" ;
                                  }else{
                                    echo "<b>Este producto no ha tenido salida</b>" ; exit;
                                  }                                 

                                ?>
                            </h2>          
                  

                        </div>
                        <div class="body">
                            <div class="row clearfix">
                              <div align="center">  
                                <h4> 
                                <?php if (isset($prodpp[0]->nombre)) {
                                    echo $prodpp[0]->nombre ;
                                  }                                 

                                ?>
                                </h4>
                                </div> 
                                <div class="col-sm-6">
                                
                                   
                      <img id="image" src="{{ asset('imageProducto/'.$prodpp[0]->url_imagen.'') }}" width="300" height="350">   
                                
                              
                               
                                </div>
                                 
                                 <div class="col-sm-6">
                                  <form action="" method="">  
                                      <br><br><br><br><br><br><br>
                                    <div class="row clearfix">
                                        <div class="col-sm-3 col-xs-2 form-control-label">
                                            <label for="email_address_2">Fecha desde</label>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" name="fechadesde" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                 
                                     <div class="row clearfix">
                                          <div class="col-sm-3 col-xs-2 form-control-label">
                                              <label for="email_address_2">Hasta</label>
                                          </div>
                                          <div class="col-sm-6 col-xs-6">
                                              <div class="form-group">
                                                  <div class="form-line">
                                                      <input type="date" name="fechahasta" class="form-control" >
                                                  </div>
                                              </div>
                                          </div>

                                          <button class="btn btn-primary">Consultar</button>
                                      </div>
                                    
                                </form>

                                </div> 

                                <hr>
                            
                            </div>

        <hr>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

          <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          
             function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Meses', '', { role: 'style' } ],
              @foreach ($prodpp as $item)
              ['{{ $item->fecha }} ', {{ $item->cantidad }}, 'stroke-color: #1874A9; stroke-width: 4; fill-color: #76A7FA'],
               @endforeach
            ]);
             var options = {
          title: 'Año 2018',
          bar: {groupWidth: "40%"},
          legend: { position: "none" },
          
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
        chart.draw(data, options);
      }
          </script>   

<div id="columnchart_values" style="width: 100%; height: 400px;"></div>

                        </div>
                    </div>
                </div>

</div>



</section>

@endsection