 <script type="text/javascript" src="<?= base_url(); ?>../js/funcionesMenu.js"></script>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menú</li>           

            <li id="DashboardAdmin" class="menuSistema active">
              <a href="#" onclick="clickMenu('DashboardAdmin')">
                <i class="fa fa-tachometer"></i> <span>Dashboard</span>
              </a>
            </li>
            <!--SUB MENU MANTENEDORES-->
            <li id="subMenu-Mantenedores" class="treeview menuSistema">
              <a href="#">
                <i class="glyphicon glyphicon-paperclip"></i> <span>Mantenedores</span>
              </a>           
              <ul class="treeview-menu subMenu-Mantenedores" style="display: none;">
                <li id="MantenedorUsuario" class="SubMenuSistema">
                  <a href="#" onclick="clickMenu('MantenedorUsuario')">
                    <i class="glyphicon glyphicon-user"></i> <span>Usuarios</span>
                  </a>
                </li>
                <li id="MantenedorPerfiles" class="SubMenuSistema">
                  <a href="#" onclick="clickMenu('MantenedorPerfiles')">
                    <i class="glyphicon glyphicon-pencil"></i> <span>Perfiles</span>
                  </a>
                </li>
                <li id="MantenedorVehiculos" class="SubMenuSistema">
                  <a href="#" onclick="clickMenu('MantenedorVehiculo')">
                    <i class="glyphicon glyphicon-paperclip"></i> <span>Vehiculos</span>
                  </a>
                </li>
                <li id="MantenedorChofer" class="SubMenuSistema">
                  <a href="#" onclick="clickMenu('MantenedorChofer')">
                    <i class="glyphicon glyphicon-user"></i> <span>Chofer</span>
                  </a>
                </li>
                <li id="MantenedorPago" class="SubMenuSistema">
                  <a href="#" onclick="clickMenu('MantenedorTipoPago')">
                    <i class="glyphicon glyphicon-paperclip"></i> <span>Tipo de Pago</span>
                  </a>
                </li>

                <li id="MantenedorTipoGasto" class="SubMenuSistema">
                  <a href="#" onclick="clickMenu('MantenedorTipoGasto')">
                    <i class="glyphicon glyphicon-paperclip"></i> <span>Tipo de Gastos</span>
                  </a>
                </li>
                
                <li id="MantenedorAsignacion" class="SubMenuSistema">
                  <a href="#" onclick="clickMenu('MantenedorTipoAsignacion')">
                    <i class="glyphicon glyphicon-paperclip"></i> <span>Asignacion</span>
                  </a>
                </li>
              
              </ul> 

            </li>
            <li id="subMenu-Mantenedores" class="treeview menuSistema">
              <a href="#">
                <i class="glyphicon glyphicon-paperclip"></i> <span>Actividades</span>
              </a>           
              <ul class="treeview-menu subMenu-Mantenedores" style="display: none;">
                
                  <li id="MantenedorPago" class="SubMenuSistema">
                    <a href="#" onclick="clickMenu('MantenedorPago')">
                      <i class="glyphicon glyphicon-user"></i> <span>Pagos</span>
                    </a>
                  </li>

                  <li id="MantenedorGasto" class="SubMenuSistema">
                    <a href="#" onclick="clickMenu('MantenedorGasto')">
                      <i class="glyphicon glyphicon-paperclip"></i> <span>Gastos</span>
                    </a>
                  </li>

                  <li id="MantenedorSolicitud" class="SubMenuSistema">
                    <a href="#" onclick="clickMenu('MantenedorSolicitud')">
                      <i class="glyphicon glyphicon-paperclip"></i> <span>Salida de Ruta</span>
                    </a>
                  </li>

                  <li id="MantenedorGastos" class="SubMenuSistema">
                    <a href="#" onclick="clickMenu('MantenedorAntecedente')">
                      <i class="glyphicon glyphicon-paperclip"></i> <span>Antecedentes</span>
                    </a>
                  </li>
              </ul>
        </section>
    <!-- /.sidebar -->
  </aside>