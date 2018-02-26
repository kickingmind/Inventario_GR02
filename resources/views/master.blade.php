<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Control de inventario</title>
    <!-- Favicon-->

  <meta name="csrf-token" content="{{ csrf_token() }}">    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        var ServerUrl="{{ url('') }}";
    </script>


    <!-- Bootstrap Core Css -->
    {!! Html::style('assets/plugins/bootstrap/css/bootstrap.css') !!}
    <!-- Waves Effect Css -->

    {!! Html::style('assets/plugins/node-waves/waves.css') !!}

 <!-- Multi Select Css -->
{!! Html::style('assets/plugins/multi-select/css/multi-select.css') !!}


 <!-- Bootstrap Select Css -->
{!! Html::style('assets/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    <!-- Animation Css -->

{!! Html::style('assets/plugins/animate-css/animate.css') !!}
    <!-- Custom Css -->

<!-- JQuery DataTable Css -->
{!! Html::style('assets/css/dataTables.bootstrap.min.css')!!}

    <!-- <link href="css/themes/all-themes.css" rel="stylesheet" />-->
 {!! Html::style('assets/css/themes/all-themes.css') !!}

     <!--<link rel="stylesheet" href="css/hover.css">-->
 {!! Html::style('assets/css/hover.css') !!}

<!-- Sweetalert Css -->
{!! Html::style('assets/css/sweetalert2.css') !!}

    <!--<link href="css/style.css" rel="stylesheet">-->

{!! Html::style('assets/css/style.css') !!}

</head>

<body class="theme-Light Green theme-light-green">
    <!-- Page Loader -->
   <!--  <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargando Espere un momento...</p>
        </div>
    </div>-->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"> </div>
    <!-- #END# Overlay For Sidebars -->

    <!--MENU_TituloApp Top Bar -->
   @include('secciones/menu')
    <!-- #Top Bar -->


    <!-- IZQUIERDA-Sidebar -->

      @include('secciones/sidebar')

    <!-- #END# Sidebar -->


 <!-- CONTENIDO -->
@yield('contenido')


 <!-- FIN-CONTENIDO -->

<!--<script type="text/javascript">
    
      $(document).ready(function() {
    $('.selectpicker').selectpicker();
  });
</script>-->

    <!-- Jquery Core Js -->
 {!! Html::script('assets/plugins/jquery/jquery.min.js') !!}

    <!-- Bootstrap Core Js -->
{!! Html::script('assets/plugins/bootstrap/js/bootstrap.js') !!}
    <!-- Select Plugin Js -->
{!! Html::script('assets/plugins/bootstrap-select/js/bootstrap-select.js') !!}
    <!-- Slimscroll Plugin Js -->
{!! Html::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') !!}

    <!--<script src="plugins/node-waves/waves.js"></script>-->
{!! Html::script('assets/plugins/node-waves/waves.js') !!}



<!-- SweetAlert Plugin Js -->
{!! Html::script('assets/js/sweetalert2.js') !!}

    <!-- Custom Js -->
{!! Html::script('assets/js/admin.js') !!}

{!! Html::script('assets/js/jquery.dataTables.min.js') !!}

<!-- Multi Select Plugin Js -->
{!! Html::script('assets/plugins/multi-select/js/jquery.multi-select.js') !!} 



{!! Html::script('assets/js/dataTables.bootstrap.min.js') !!}
    <!-- Demo Js -->
{!! Html::script('assets/js/demo.js') !!}
{!! Html::script('assets/js/script.js') !!}

</body>

</html>
