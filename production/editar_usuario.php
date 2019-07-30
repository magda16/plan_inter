<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

if(isset($_POST['id'])){
    $id_usuario=$_POST['id'];

        $stmt= $pdo->prepare("SELECT u.nombre, u.apellido, u.dui, u.nit, u.usuario, u.clave, u.correo,o.id_oficina, o.nombre AS oficina, u.estado, u.nivel, u.id_empresa  FROM usuarios AS u INNER JOIN oficinas AS o ON (u.id_oficina=o.id_oficina) WHERE id_usuario=:id_usuario");
        $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $lista_usuario){     
            $nombre=$lista_usuario['nombre'];
            $apellido=$lista_usuario['apellido'];
            $dui=$lista_usuario['dui'];
            $nit=$lista_usuario['nit'];
            $usuario=$lista_usuario['usuario'];
            $clave=$lista_usuario['clave'];
            $correo=$lista_usuario['correo'];
            $id_oficina=$lista_usuario['id_oficina'];
            $oficina=$lista_usuario['oficina'];
            $estado=$lista_usuario['estado'];
            $nivel=$lista_usuario['nivel'];
            $idemp=$lista_usuario['id_empresa'];
        }

        $stmt2= $pdo->prepare("SELECT razon_social FROM empresas WHERE id_empresa=:id_empresa");
        $stmt2->bindParam(":id_empresa",$idemp,PDO::PARAM_INT);
        $stmt2->execute();
        $result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $lista_empresa){     
          $emp=$lista_empresa['razon_social'];
        }

} 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plan Internacional | Bolsa de Trabajo</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/PNotify/dist/PNotifyBrightTheme.css" rel="stylesheet" type="text/css" />

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- logo -->
            <?php
              include("logo.php");
            ?>
            <!-- /logo -->

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <h3 style="color:#FFFFFF" align="center">Bolsa de Trabajo</h3>
              <div class="profile_pic">
                <img src="images/user2.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                
                <h4 style="color:#FFFFFF">Bienvenido</h4>
                <h2><?php echo $_SESSION['usuario_g']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php
              include("menu_principal.php");
            ?>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <?php
          include("menu_salir.php");
        ?>
        <!-- /top navigation -->

        <!-- page content -->

        <div class="right_col" role="main">
          <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2">
            <div class="page-title">
              <div class="title_left">
                <h2><i class="fa fa-folder-open-o"></i> Usuarios</h2>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Usuario</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Usuarios" href="lista_usuarios.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                   
                    <form id="form_usuario" name="form_usuario" method="POST" class="form-horizontal form-label-left">
                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="actualizar" name="actualizar" value="<?php echo $id_usuario; ?>">
                      <input type="hidden" id="id_oficina" name="id_oficina" value="<?php echo $id_oficina; ?>">
                      <input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $idemp; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" required="required" placeholder="Ingrese Nombre" value="<?php echo $nombre; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="apellido" name="apellido" required="required" placeholder="Ingrese Apellido" value="<?php echo $apellido; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="dui" name="dui" data-inputmask="'mask': '99999999-9'" required="required" class="form-control col-md-7 col-xs-12" placeholder="Digite DUI" value="<?php echo $dui; ?>">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="nit" name="nit" data-inputmask="'mask': '9999-999999-999-9'" required="required" class="form-control col-md-7 col-xs-12" placeholder="Digite NIT" value="<?php echo $nit; ?>">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario">Usuario: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="usuario" name="usuario" required="required" placeholder="Ingrese Usuario" value="<?php echo $usuario; ?>">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nivel">Nivel: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="nivel" name="nivel">
                            <option selected="selected" value="">Seleccione Nivel</option>
                            <option value="Gestor Empresarial" <?php if($nivel=="Gestor Empresarial") echo "selected"; ?> >Gestro Empresarial</option>
                            <option value="Gestor Empleo Plan" <?php if($nivel=="Gestor Empleo Plan") echo "selected"; ?> >Gestor Empleo Plan</option>
                            <option value="Gestor Empleo" <?php if($nivel=="Gestor Empleo") echo "selected"; ?> >Gestor Empleo</option>
                            <option value="Empresa" <?php if($nivel=="Empresa") echo "selected"; ?> >Empresa</option>
                          </select>
                        </div>
                        <span class="help-block"></span>
                      </div>
                      
                      <div id="div_empre" name="div_empre">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa: <span style="color:	#000080;"> '</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label  "><?php echo $emp; ?> </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Empresa?
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            </br>
                            <input type="checkbox" class="" id="em" name="em"/>
                          </div>
                        </div>

                        <div id="div_emp" name="div_emp">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="empresa" name="empresa">
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Oficina: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                        <i class="fa fa-building-o"></i>
                        <label class="control-label  "><?php echo $oficina; ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Oficina?
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          </br>
                          <input type="checkbox" class="" id="of" name="of"/>
                        </div>
                      </div>

                      <div class="form-group" id="div_o" name="div_o">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oficina">Oficina: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="oficina" name="oficina">
                          </select>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado">Estado: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="estado" name="estado">
                            <option value="activo" <?php if($estado=="activo") echo "selected"; ?> >Activo</option>
                            <option value="inactivo" <?php if($estado=="inactivo") echo "selected"; ?> >Inactivo</option>
                          </select>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="correo" name= "correo" required="required" placeholder="Ingrese Correo Electrónico" value="<?php echo $correo; ?>">
                          <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clave">Contraseña: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control has-feedback-left" id="clave" name="clave" required="required" placeholder="Ingrese Contraseña" value="<?php echo $clave; ?>">
                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmar_clave">Repetir Contraseña: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control has-feedback-left" id="confirmar_clave" name="confirmar_clave" required="required" placeholder="Ingrese Contraseña" value="<?php echo $clave; ?>">
                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="ln_solid"></div>
                        
                        <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                        <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                        
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">
                            <button class="btn btn-round btn-primary" type="button" id="btneditar" name="btneditar"><i class="fa fa-refresh"></i>  Actualizar</button>
                          </div>
                        

                    </form> 
                    </div>
                   </div>             
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <?php
          include("pie_pagina.php");
        ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    
    <!-- PNotify -->
    <script src="../vendors/PNotify/dist/iife/PNotify.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyButtons.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyConfirm.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyMobile.js"></script>

    <!-- Validaciones -->
    <script src="../vendors/validar/jquery.validate.js"></script>
    <!-- Validaciones Form Usuario -->
    <script src="../build/js/validaciones/form_usuario.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>