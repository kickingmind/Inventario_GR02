  <section>

        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <a href="/aplicacion"><div class="user-info">
                <!--Aqui va el logo en CSS

                    .sidebar .user-info {
                    padding: 13px 15px 12px 15px;
                    white-space: nowrap;
                    position: relative;
                    border-bottom: 1px solid #e9e9e9;
                    background: url(../images/user-img-background.jpg) no-repeat no-repeat;
                    height: 135px;
                  }-->
            </div>
            </a>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENÚ</li>

                       <li >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_horiz</i>
                            <span>MOVIMIENTOS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                            <a href="/remision" >
                                    <span>Remisión Salida</span>
                           </a>

                            </li>

                           <!-- <li>
                            <a href="javascript:void(0);" >
                                    <span>Compra Entrada</span>
                           </a>
                            </li> -->

                            <li>
                            <a href="javascript:void(0);" >
                                    <span>Devolución</span>
                           </a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">equalizer</i>
                            <span>CONSULTAR</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                            <a href="{{ route('consultaProductos') }}" >
                                    <span>Consultar Productos</span>
                           </a>

                            </li>

                            <li>
                            <a href="{{ route('consultaRemision') }}" >
                                    <span>Consultar Remision salida</span>
                           </a>
                            </li>

                        </ul>
                    </li>               

                   <li >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">add</i>
                            <span>NUEVO</span>
                        </a>
                        <ul class="ml-menu">
                           <!-- <li>
                            <a href="javascript:void(0);" >
                                    <span>Nuevo Proveedor</span>
                           </a>

                            </li>-->

                              <li>
                            <a href="{{ route('categProductos') }}" >
                                    <span>Nuevo Categoria productos</span>
                           </a>

                            </li>

                            <li>
                            <a href="{{ route('productos.index') }}" >
                                    <span>Nuevo Productos</span>
                           </a>
                            </li>

                           
                             <li>
                            <a href="{{ route('areas.index') }}" >
                                    <span>Nueva Area</span>
                           </a>
                            </li>
                            <li>
                            <a href="{{ route('compania.index') }}" >
                                    <span>Nueva Compañia</span>
                           </a>
                            </li>

                              <li>
                            <a href="{{ route('almacen.index') }}" >
                                    <span>Nuevo Almacen</span>
                           </a>
                            </li>


                             <li>
                            <a href="/register" >
                                    <span>Nuevo Usuario</span>
                           </a>
                            </li>

                           <!-- <li>
                            <a href="{{ route('perfiles.index') }}" >
                                    <span>Nuevo Perfil</span>
                           </a>
                            </li> -->

                        </ul>
                    </li>

                    <li class="header active"></li>


                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <a href="javascript:void(0);">Desarrollado por - Marcos Ortiz</a><br>
                    &copy; 2018
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>

</section>
