            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-desktop"></i> Inicio </a>
                  </li>
                  <?php 
                    $nivel_usuario=$_SESSION['nivel_g'];
                    if($nivel_usuario=="Gestor Empresarial"){

                  ?>
                  <li><a><i class="fa fa-folder-o"></i> Demandantes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ingreso_demandante.php">Agregar</a></li>
                      <li><a href="lista_demandantes.php">Ver Listado</a></li>
                      <li><a href="lista_demandantes_ofertas.php">Aplicar a Oferta</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder-o"></i>Empresas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="ingreso_empresa.php">Agregar Empresas</span></a></li>
                        <li><a href="ingreso_oferta.php">Agregar Ofertas</span></a></li>
                        <li><a href="lista_empresas.php">Ver lista de Empresas</a></li>
                        <li><a href="lista_ofertas.php">Ver lista de ofertas</a></li>
                        <li><a href="lista_aplicantes_oferta.php">Ver lista aplicantes ofertas</a></li>
                        
                    </ul>
                  </li>  
                  <li><a><i class="fa fa-user"></i>Usuario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="ingreso_oficina.php">Agregar Oficinas</a>
                        <li><a href="ingreso_usuario.php">Agregar Usuario</span></a></li>
                        <li><a href="lista_oficinas.php">Ver lista de oficinas</a></li>
                        <li><a href="lista_usuarios.php">Ver lista de Usuarios</a></li>
                     
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-newspaper-o"></i>Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Aplicaciones disponibles</a></li>
                      <li><a href="media_gallery.html">Aplicaciones por periodo</a></li>
                      <li><a href="typography.html">Demandantes por periodo</a></li>
                      <li><a href="lista_emp_periodo.php">Empresas por periodo</a></li>
                      
                    </ul>
                  </li> 
                  <?php

                  }else if($nivel_usuario=="Gestor Empleo Plan"){ 
                  
                  ?>

                  <li><a><i class="fa fa-folder-o"></i> Demandantes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ingreso_demandante.php">Agregar</a></li>
                      <li><a href="lista_demandantes.php">Ver Listado</a></li>
                      <li><a href="lista_demandantes_ofertas.php">Aplicar a Oferta</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder-o"></i>Empresas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="ingreso_oferta.php">Agregar Ofertas</span></a></li>
                        <li><a href="lista_empresas_gep.php">Ver lista de Empresas</a></li>
                        <li><a href="lista_ofertas_gep.php">Ver lista de ofertas</a></li>
                        <li><a href="lista_aplicantes_oferta.php">Ver lista aplicantes ofertas</a></li>
                        
                    </ul>
                  </li>  
                  <li><a><i class="fa fa-newspaper-o"></i>Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Aplicaciones disponibles</a></li>
                      <li><a href="media_gallery.html">Aplicaciones por periodo</a></li>
                      <li><a href="typography.html">Demandantes por periodo</a></li>
                      <li><a href="lista_emp_periodo.php">Empresas por periodo</a></li>
                      
                    </ul>
                  </li>  

                  <?php  
                  }else if($nivel_usuario=="Gestor Empleo"){ 
                  ?>
                  <li><a><i class="fa fa-folder-o"></i> Demandantes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ingreso_demandante.php">Agregar</a></li>
                      <li><a href="lista_demandantes_ge.php">Ver Listado</a></li>
                    </ul>
                  </li>

                  <?php
                  }else if($nivel_usuario=="Empresa"){ 
                  ?>

                  <li><a><i class="fa fa-folder-o"></i>Empresas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ingreso_oferta.php">Agregar Ofertas</span></a></li>
                      <li><a href="lista_ofertas.php">Ver lista de ofertas</a></li>
                      <li><a href="lista_aplicantes_oferta.php">Ver lista aplicantes ofertas</a></li>
                    </ul>
                  </li>  

                  <?php
                  }
                  ?>

                  <li><a><i class="fa fa-sliders"></i>Configuracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="cambiar_clave">Cambiar contraseña</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>