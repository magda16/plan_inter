<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

if(isset($_POST['id'])){
    $id_empresa=$_POST['id'];

        $stmt= $pdo->prepare("SELECT * FROM empresas WHERE id_empresa=:id_empresa");
        $stmt->bindParam(":id_empresa",$id_empresa,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $lista_empresa){     
            $razon_social=$lista_empresa['razon_social'];
            $nombre_comercial=$lista_empresa['nombre_comercial'];
            $nit=$lista_empresa['nit'];
            $numero_patronal=$lista_empresa['numero_patronal'];
            $numero_contribuyente=$lista_empresa['numero_contribuyente'];
            $descrip_gral_act_econo=$lista_empresa['descrip_gral_act_econo'];
            $descrip_espec_act_econo=$lista_empresa['descrip_espec_act_econo'];
            $total_empleados=$lista_empresa['total_empleados'];
            $direccion=$lista_empresa['direccion'];
            $zona=$lista_empresa['zona'];
            $telefono=$lista_empresa['telefono'];
            $correo=$lista_empresa['email'];
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
                <h2><i class="fa fa-folder-open-o"></i> Empresas</h2>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Empresa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Empresas" href="lista_empresas.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                   
                    <form id="form_empresa" name="form_empresa" method="POST" class="form-horizontal form-label-left">
                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="actualizar" name="actualizar" value="<?php echo $id_empresa; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razon_social">Razón Social: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="razon_social" name="razon_social" required="required" placeholder="Ingrese Razón Social" value="<?php echo $razon_social; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_comercial">Nombre Comercial: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nombre_comercial" name="nombre_comercial" required="required" placeholder="Ingrese Nombre Comercial" value="<?php echo $nombre_comercial; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_patronal">Número Patronal: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="numero_patronal" name="numero_patronal" required="required" placeholder="Ingrese Número Patronal" value="<?php echo $numero_patronal; ?>">
                          <span class="fa fa-calculator form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_contribuyente">Número Contribuyente: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="numero_contribuyente" name="numero_contribuyente" required="required" placeholder="Ingrese Número Contribuyente" value="<?php echo $numero_contribuyente; ?>">
                          <span class="fa fa-calculator form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descrip_gral_act_econo">Descrip. General de Act. Económica: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="descrip_gral_act_econo" name="descrip_gral_act_econo" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Descrip. General de Act. Económica"><?php echo $descrip_gral_act_econo; ?></textarea>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descrip_espec_act_econo">Descrip. Específica de Act. Económica: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="descrip_espec_act_econo" name="descrip_espec_act_econo" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Descrip. Específica de Act. Económica"><?php echo $descrip_espec_act_econo; ?></textarea>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_empleados">Total Empleados: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="total_empleados" name="total_empleados" required="required" placeholder="Ingrese Total Empleados" value="<?php echo $total_empleados; ?>">
                          <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" required="required" placeholder="Ingrese Dirección" value="<?php echo $direccion; ?>">
                          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zona">Zona: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="zona" name="zona" required="required" placeholder="Ingrese Zona" value="<?php echo $zona; ?>">
                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="telefono" name= "telefono" data-inputmask="'mask': '9999-9999'" required="required" placeholder="Digite Número de Teléfono" value="<?php echo $telefono; ?>">
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
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

                      <div class="ln_solid"></div>
                        <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                        
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
    <!-- Validaciones Form Empresa -->
    <script src="../build/js/validaciones/form_empresa.js"></script>
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