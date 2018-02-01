  <section>

        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
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
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENÚ</li>

                   <li >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">add</i>
                            <span>NUEVO</span>
                        </a>
                        <ul class="ml-menu">
                         

                            <li>
                            <a href="/operador" >
                                    <span>Nuevo Productos</span>
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
                            <a href="{{ route('opereporte') }}" >
                                    <span>Consultar Productos</span>
                           </a>

                            </li>

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
