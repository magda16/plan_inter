<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

if(isset($_POST['mostrar'])){
    $id_oficina=$_POST['mostrar'];

        $stmt= $pdo->prepare("SELECT * FROM oficinas WHERE id_oficina=:id_oficina");
        $stmt->bindParam(":id_oficina",$id_oficina,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $lista_oficina){     
            $nombre=$lista_oficina['nombre'];
            $direccion=$lista_oficina['direccion'];
            $responsable=$lista_oficina['responsable'];
            $telefono= $lista_oficina['telefono'];
            $correo=$lista_oficina['email'];
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
                <h2><i class="fa fa-folder-open-o"></i> Oficinas</h2>
              </div> 
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Mostrar Oficina</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Oficinas" href="lista_oficinas.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                   
                  <form id="form_oficina" name="form_oficina" method="POST" class="form-horizontal form-label-left">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-building-o"></i>
                          <label class="control-label"><?php echo $nombre; ?></label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="responsable">Responsable: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                          <i class="fa fa-user"></i>
                          <label class="control-label"><?php echo $responsable; ?></label>
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
                        <button class="btn btn-round btn-default" type="button" onclick="location.href='../production/lista_oficinas.php'"><i class="fa fa-undo"></i>  Regresar</button>
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
    <!-- Validaciones Form Demandantes -->
    <script src="../build/js/validaciones/form_oficina.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>