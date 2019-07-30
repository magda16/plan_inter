<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");
$nivel_usu=$_SESSION['nivel_g'];
if(isset($_POST['mostrar'])){
    $id_empresa=$_POST['mostrar'];

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
                    <h2>Mostrar Empresa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <?php
                        if($nivel_usuario=="Gestor Empresarial"){
                      ?>
                        <li><a data-toggle="tooltip" data-placement="top" title="Lista Empresas" href="lista_empresas.php" ><i class="fa fa-list"></i></a>
                        </li>
                      <?php
                        }else if($nivel_usuario=="Gestor Empleo Plan"){ 
                      ?>
                        <li><a data-toggle="tooltip" data-placement="top" title="Lista Empresas" href="lista_empresas_gep.php" ><i class="fa fa-list"></i></a>
                        </li>
                      <?php
                        }
                      ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                   
                    <form id="form_empresa" name="form_empresa" method="POST" class="form-horizontal form-label-left">
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razon_social">Razón Social: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-user"></i>
                          <label class="control-label"><?php echo $razon_social; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_comercial">Nombre Comercial: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-user"></i>
                          <label class="control-label"><?php echo $nombre_comercial; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-list-alt"></i>
                          <label class="control-label"><?php echo $nit; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_patronal">Número Patronal: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-calculator"></i>
                          <label class="control-label"><?php echo $numero_patronal; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_contribuyente">Número Contribuyente: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-calculator"></i>
                          <label class="control-label"><?php echo $numero_contribuyente; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descrip_gral_act_econo">Descrip. General de Act. Económica: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-circle-o"></i>
                          <label class="control-label"><?php echo $descrip_gral_act_econo; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descrip_espec_act_econo">Descrip. Específica de Act. Económica: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-circle-o"></i>
                          <label class="control-label"><?php echo $descrip_espec_act_econo; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_empleados">Total Empleados: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-users"></i>
                          <label class="control-label"><?php echo $total_empleados; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-truck"></i>
                          <label class="control-label"><?php echo $direccion; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zona">Zona: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-globe"></i>
                          <label class="control-label"><?php echo $zona; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-phone"></i>
                          <label class="control-label"><?php echo $telefono; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo Electrónico: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-envelope-o"></i>
                          <label class="control-label"><?php echo $correo; ?></label>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                        
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">
                          <?php
                            if($nivel_usuario=="Gestor Empresarial"){
                          ?>
                          <button class="btn btn-round btn-default" type="button" onclick="location.href='../production/lista_empresas.php'"><i class="fa fa-undo"></i>  Regresar</button>
                          <?php
                            }else if($nivel_usuario=="Gestor Empleo Plan"){ 
                          ?>
                            <button class="btn btn-round btn-default" type="button" onclick="location.href='../production/lista_empresas_gep.php'"><i class="fa fa-undo"></i>  Regresar</button>
                          <?php
                            }
                          ?>
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
    
    <!-- Validaciones -->
    <script src="../vendors/validar/jquery.validate.js"></script>
    <!-- Validaciones Form Empresa -->
    <script src="../build/js/validaciones/form_empresa.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>