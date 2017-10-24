
<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              

              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                
                  <i class="glyphicon glyphicon-envelope"></i><span class="label label-danger"><?php echo $cantidad?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tú tienes 10 mensaje(s) el día de hoy</li>
                  <li>
                      <!-- inner menu: contains the actual data -->
                      <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style=" width: 100%; height: 200px;">
         
                  </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                    </li>
                  
                  <li class="footer"><a onclick="clickMenu('Mensajes')">Ver todos los mensajes</a></li>
                </ul>
              </li>

              <li class="dropdown notifications-menu" style="display: none;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">    
                  <i class="glyphicon glyphicon-bell"></i><span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tú tienes 10 notificaciones el dia de hoy</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 10 nuevos miembros
                        </a>
                      </li>
                    </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                  </li>
                  <li class="footer"><a href="#">Ver todos</a></li>
                </ul>
              </li>





                  <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                  
                  <img src="<?php echo $imagen?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $nombre?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $imagen?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $nombre?> - <?php echo $Perfil?>
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <button id="cerrar" class="btn btn-warning" onclick="clickMenu('MiPerfil')" data-toggle="tooltip" data-placement="bottom" title="Ir al perfil"> Perfil</button> 
                    </div>
                    <div class="pull-right">                                          
                      <button id="cerrar" class="btn btn-danger" onclick="cerrar_sesion()" data-toggle="tooltip" data-placement="bottom" title="Salir del Sistema"> Cerrar sesion</button> 
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>