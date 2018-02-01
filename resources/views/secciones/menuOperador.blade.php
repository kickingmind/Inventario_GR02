<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/operador"><b>CONTROL DE INVENTARIO</b> </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    @guest
                        <li><a href="{{ route('login') }}">Acceso</a></li>
                        <li><a href="{{ route('register') }}">Registro</a></li>
                    @else
                 
                  
                     <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-user"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('login') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <span class="glyphicon glyphicon-log-in"></span>
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    <!-- #END# Notificaciones -->

                    <!-- Nombre-Usuario -->
                        
     <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Ruth Gutierres</a></li> -->
     <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li> -->
                    <!-- FIN-Nombre-Usuario -->
                 @endguest
                </ul>
            </div>
        </div>
    </nav>